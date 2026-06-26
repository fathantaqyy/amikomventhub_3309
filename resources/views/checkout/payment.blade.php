@extends('layouts.app')

@section('title', 'Pembayaran')

@section('content')
<main class="max-w-2xl mx-auto px-6 py-20">

    <div class="bg-white rounded-3xl shadow-lg border border-slate-200 p-10">

        <h1 class="text-3xl font-extrabold text-center mb-3">
            Selesaikan Pembayaran
        </h1>

        <p class="text-center text-slate-500 mb-8">
            Silakan lanjutkan pembayaran melalui Midtrans.
        </p>

        <div class="bg-slate-50 rounded-2xl p-6 space-y-4">

            <div class="flex justify-between">
                <span class="font-semibold text-slate-500">
                    Order ID
                </span>

                <span class="font-bold">
                    {{ $transaction->order_id }}
                </span>
            </div>

            <div class="flex justify-between">
                <span class="font-semibold text-slate-500">
                    Status
                </span>

                <span class="text-yellow-600 font-bold">
                    {{ $transaction->status }}
                </span>
            </div>

            <hr>

            <div class="flex justify-between text-xl">

                <span class="font-bold">
                    Total Bayar
                </span>

                <span class="font-black text-indigo-600">
                    Rp {{ number_format($transaction->total_price,0,',','.') }}
                </span>

            </div>

        </div>

        <button
            id="pay-button"
            class="mt-8 w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 rounded-2xl transition duration-300 shadow-lg">
            Bayar Sekarang
        </button>

    </div>

</main>
@endsection

@section('extra-scripts')

<script
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{ config('services.midtrans.clientKey') }}">
</script>

<script>

document.getElementById('pay-button').onclick=function(){

snap.pay('{{ $transaction->snap_token }}',{

onSuccess: function(result){
    window.location.href = "{{ route('checkout.success', $transaction->id) }}";
},

onPending:function(result){

alert("Menunggu pembayaran.");

},

onError:function(result){

alert("Pembayaran gagal.");

},

onClose:function(){

alert("Anda menutup popup pembayaran.");

}

});

}

</script>

@endsection