<x-app-layout>
    @push('script')
    {{-- <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script> --}}
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{ $transaction_token }}', {
            onSuccess: function(result){
            /* You may add your own implementation here */
            send_response(result);
            },
            onPending: function(result){
            /* You may add your own implementation here */
            send_response(result);
            },
            onError: function(result){
            /* You may add your own implementation here */
            send_response(result);
            },
            onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
            }
        })
        });

        function send_response(result) {
            document.getElementById('json_callback').value = JSON.stringify(result);
            document.getElementById('submit_form').submit();
            // $('#submit_form').submit();
        }
    </script>
@endpush

<div>
    <form action="" method="POST" id="submit_form">
        @csrf
        <input type="hidden" name="json" id="json_callback">
    </form>
    <div class="lg:px-8 lg:my-4 mx-auto">
        <div class="container px-24 mx-auto py-4 space-y-4">
            <h1 class="text-slate-700 font-bold text-2xl">Pembayaran</h1>
            <h1 class="text-slate-700 font-semibold text-base">Alamat Pengiriman</h1>

            <div class="flex gap-2 justify-between">
                <div class="border-t">
                    <div class="my-4">
                        <h1 class="text-slate-700 font-semibold text-base">{{ auth()->user()->name }}</h1>
                        <p class="text-slate-600 text-sm">{{ auth()->user()->phone_number }}</p>
                        <p class="text-slate-500 text-base">{{ auth()->user()->address }}</p>
                        @if (!empty(auth()->user()->kota_id))
                            <p class="text-slate-500 text-base inline">{{ $kota['city_name'] }}</p>
                        @endif
                        @if (!empty(auth()->user()->provinsi_id))
                            <p class="text-slate-500 text-base inline">{{ $provinsi['province'] }}</p>
                        @endif
                    </div>
                    <hr>
                    @foreach ($carts as $cart)
                        <div class="mt-4">
                            <h1 class="text-slate-700 font-semibold">Pesanana {{ $loop->iteration }}</h1>
                        </div>
                        <div class="mb-3 rounded-md p-3">
                            <div class="flex gap-2">
                                <div>
                                    <img src="{{ asset('images/' . $cart->product->gambar) }}" alt="{{ $cart->product->name }}" class="lg:w-20 rounded-md">
                                </div>
                                <div>
                                    <h1 class="text-base text-slate-700 mb-1">{{ $cart->product->name }}</h1>
                                    <h2 class="text-slate-800 font-bold text-base">Rp. {{ number_format($cart->total_price) }}</h2>
                                </div>
                            </div>
                        </div>
                        <hr class="border-2">
                    @endforeach
                </div>
                <div>
                    <div class="p-4 rounded-md shadow-md">
                        <div class="border-b border-b-slate-300 py-4 mb-4">
                            <div class="mb-4">
                                <h1 class="text-slate-700 font-semibold text-lg">Ringkasan Belanja</h1>
                            </div>
                            <div class="flex items-center justify-between gap-4 mt-3">
                                <div>
                                    <h1 class="text-slate-700 text-base">Total Harga ({{ $total_item }}) barang</h1>
                                </div>
                                <div>
                                    <h2 class="text-slate-700 text-base">Rp. {{ number_format($total_price) }}</h2>
                                </div>
                            </div>
                            <div class="flex items-center justify-between gap-4 mt-3">
                                <div>
                                    <h1 class="text-slate-700 text-base">Ongkos Kirim</h1>
                                </div>
                                <div>
                                    <h2 class="text-slate-700 text-base">Rp. {{ number_format($ongkir) }}</h2>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center justify-between gap-2 mb-5">
                                <h1 class="text-slate-700 font-semibold text-lg">Total Tagihan</h1>
                                <h1 class="text-slate-700 font-semibold text-lg">Rp. {{ number_format($subtotal) }}</h1>
                            </div>
                            <div>
                                <button id='pay-button' class="w-full bg-teal-500 text-white font-semibold hover:bg-teal-600 transition-all duration-300 rounded-lg py-2 px-4">Pilih Pembayaran</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>

