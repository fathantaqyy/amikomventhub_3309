<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;


class CheckoutController extends Controller
{
    public function create(Event $event)
    {
        $categories = Category::all();

        return view('checkout.create', compact('event', 'categories'));
    }

    public function store(Request $request, Event $event)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
        ]);

        if ($event->stock <= 0) {
            return back()->with('error', 'Mohon maaf, tiket untuk acara ini sudah habis.');
        }

        $orderId = 'TRX-' . time() . '-' . strtoupper(Str::random(5));
        
        // Pastikan harga dibulatkan jadi integer murni sejak awal perhitungan matematisnya
        $eventPrice = (int) $event->price;
        $serviceFee = 5000;
        $totalPrice = $eventPrice + $serviceFee;

        // 1. PERBAIKAN: Gunakan \Midtrans\Config, bukan \Config bawaan Laravel
        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // 2. Buat Payload Parameter untuk dikirim ke Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $totalPrice,
            ],
            'customer_details' => [
                'first_name' => $request->customer_name,
                'email' => $request->customer_email,
                'phone' => $request->customer_phone,
            ],
            'item_details' => [
                [
                    'id' => preg_replace('/[^a-zA-Z0-9_-]/', '', (string)$event->id),
                    'price' => $eventPrice, 
                    'quantity' => 1,
                    'name' => substr(preg_replace('/[^a-zA-Z0-9\s]/', '', $event->title), 0, 50),
                ],
                [
                    'id' => 'FEE-01',
                    'price' => $serviceFee,
                    'quantity' => 1,
                    'name' => 'Biaya Layanan',
                ]
            ]
        ];

        try {
            // 3. Dapatkan Snap Token dari Midtrans
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            // 4. Simpan ke database beserta snap_token-nya
            $transaction = Transaction::create([
                'event_id' => $event->id,
                'order_id' => $orderId,
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'total_price' => $totalPrice,
                'status' => 'Pending',
                'snap_token' => $snapToken,
            ]);

            $event->decrement('stock');

            // 5. Alihkan ke halaman invoice/pembayaran khusus
            return redirect()->route('checkout.payment', $transaction->id);

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memproses pembayaran ke Midtrans: ' . $e->getMessage());
        }
    }

    public function payment(Transaction $transaction)
    {
        return view('checkout.payment', compact('transaction'));
    }

    public function success(Transaction $transaction)
{
    return view('checkout.success', compact('transaction'));
}

//     public function callback(Request $request)
// {
//     Config::$serverKey = env('MIDTRANS_SERVER_KEY');
//     Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);

//     try {
//         $notification = new \Midtrans\Notification();

//         $transactionStatus = $notification->transaction_status;
//         $orderId = $notification->order_id;
//         $fraudStatus = $notification->fraud_status;

//         $transaction = Transaction::where('order_id', $orderId)->first();

//         if (!$transaction) {
//             return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
//         }

//         if ($transactionStatus == 'capture') {
//             if ($fraudStatus == 'challenge') {
//                 $transaction->update(['status' => 'Challenge']);
//             } else if ($fraudStatus == 'accept') {
//                 $transaction->update(['status' => 'Success']);
//             }
//         } else if ($transactionStatus == 'settlement') {
//             $transaction->update(['status' => 'Success']);
//         } else if ($transactionStatus == 'any') {
//             $transaction->update(['status' => 'Pending']);
//         } else if ($transactionStatus == 'deny' || $transactionStatus == 'expire' || $transactionStatus == 'cancel') {
//             $transaction->update(['status' => 'Failed']);
//             // Opsional: Mengembalikan stok jika transaksi gagal/batal
//             $transaction->event()->increment('stock');
//         }

//         return response()->json(['message' => 'Notifikasi Midtrans berhasil diproses']);

//     } catch (\Exception $e) {
//         return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
//     }
// }
public function callback(Request $request)
    {
        // Gunakan config() bawaan services agar selaras dengan checkout
        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');

        try {
            // Tambahkan backslash global \Midtrans\ di depan Notification
            $notification = new \Midtrans\Notification();

            $transactionStatus = $notification->transaction_status;
            $orderId = $notification->order_id;
            $fraudStatus = $notification->fraud_status;

            $transaction = Transaction::where('order_id', $orderId)->first();

            if (!$transaction) {
                return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
            }

            if ($transactionStatus == 'capture') {
                if ($fraudStatus == 'challenge') {
                    $transaction->update(['status' => 'Challenge']);
                } else if ($fraudStatus == 'accept') {
                    $transaction->update(['status' => 'Success']);
                }
            } else if ($transactionStatus == 'settlement') {
                $transaction->update(['status' => 'Success']);
            } else if ($transactionStatus == 'pending') {
                $transaction->update(['status' => 'Pending']);
            } else if ($transactionStatus == 'deny' || $transactionStatus == 'expire' || $transactionStatus == 'cancel') {
                $transaction->update(['status' => 'Failed']);
                
                // Opsional: Kembalikan stok jika batal
                if ($transaction->event) {
                    $transaction->event()->increment('stock');
                }
            }

            return response()->json(['message' => 'Notifikasi Midtrans berhasil diproses']);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }
}   
