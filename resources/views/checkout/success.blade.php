@extends('layouts.app')

@section('content')

<main class="max-w-2xl mx-auto py-20 px-6">

<div class="bg-white rounded-3xl shadow-lg border p-10 text-center">

<div class="text-6xl mb-5">
✅
</div>

<h1 class="text-3xl font-bold mb-3">
Pembayaran Berhasil
</h1>

<p class="text-slate-500 mb-8">
Terima kasih telah melakukan pembelian tiket.
</p>

<div class="bg-slate-50 rounded-2xl p-6 text-left">

<div class="flex justify-between mb-3">
<span>Order ID</span>
<span class="font-bold">{{ $transaction->order_id }}</span>
</div>

<div class="flex justify-between mb-3">
<span>Status</span>
<span class="text-green-600 font-bold">
{{ $transaction->status }}
</span>
</div>

<div class="flex justify-between">
<span>Total</span>
<span class="font-bold">
Rp {{ number_format($transaction->total_price,0,',','.') }}
</span>
</div>

</div>

<a
href="{{ route('home') }}"
class="mt-8 inline-block w-full bg-indigo-600 text-white py-4 rounded-2xl font-bold hover:bg-indigo-700">

Kembali ke Home

</a>

</div>

</main>

@endsection