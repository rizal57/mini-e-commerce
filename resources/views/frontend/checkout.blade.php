<x-app-layout>
    {{-- <div class="container px-4"> --}}
        <div class="lg:px-8 lg:my-4 mx-auto">
            <div class="container px-24 mx-auto py-4 space-y-4">
                <h1 class="text-slate-700 font-bold text-2xl">Checkout</h1>
                <h1 class="text-slate-700 font-semibold text-base">Alamat Pengiriman</h1>

                <div class="flex gap-2 justify-between">
                    <div class="border-t">
                        <div class="my-4">
                            <h1 class="text-slate-700 font-semibold text-base">{{ auth()->user()->name }}</h1>
                            <p class="text-slate-600 text-sm">{{ auth()->user()->phone_number }}</p>
                            <p class="text-slate-500 text-base">{{ auth()->user()->address }}</p>
                            <p class="text-slate-500 text-base inline">{{ $kota['city_name'] }}</p>
                            <p class="text-slate-500 text-base inline">{{ $provinsi['province'] }}</p>
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
                            {{-- <hr>
                            <div class="flex items-center justify-between py-4 text-slate-700 font-semibold">
                                <div>Subtotal</div>
                                <div>Rp. 123123</div>
                            </div> --}}
                            <hr class="border-2">
                        @endforeach
                    </div>
                    <div>
                        <div class="p-4 rounded-md shadow-md">
                            <div class="border-b border-b-slate-300 py-4 mb-4">
                                <div class="mb-4">
                                    <h1 class="text-slate-700 font-semibold text-lg">Ringkasan Belanja</h1>
                                </div>
                                <div class="flex items-center justify-between gap-2 mb-4">
                                    <label class="text-teal-500 font-semibold text-base">Pilih Kurir</label>
                                    <select wire:model="courier_id" id="courier_id" class="p-2 px-2 w-40 border border-slate-300 rounded-md ring-slate-500 focus:ring-teal-400 focus:border-slate-200 text-slate-500">
                                        <option value="">-- Pilih Kurir --</option>
                                        <option value="jne">JNE</option>
                                        <option value="tiki">Tiki</option>
                                        <option value="pos">Pos Indonesia</option>
                                    </select>
                                </div>
                                <div class="flex items-center justify-between gap-4">
                                    <div>
                                        <h1 class="text-slate-700 text-base">Total Harga ({{ $total_item }}) barang</h1>
                                    </div>
                                    <div>
                                        <h2 class="text-slate-700 text-base">Rp. {{ number_format($total_price) }}</h2>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="flex items-center justify-between gap-8 mb-5">
                                    <h1 class="text-slate-700 font-semibold text-lg">Total Harga</h1>
                                    <h1 class="text-slate-700 font-semibold text-lg">Rp. 10.000.000</h1>
                                </div>
                                <div>
                                    <button wire:click="beli" class="w-full bg-teal-500 text-white font-semibold hover:bg-teal-600 transition-all duration-300 rounded-lg py-2 px-4">Pilih Pembayaran</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- </div> --}}
</x-app-layout>
