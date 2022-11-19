@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

<div>
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
                        {{-- @if (!empty(auth()->user()->kota_id))
                            <p class="text-slate-500 text-base inline">{{ $kota['city_name'] }}</p>
                        @endif
                        @if (!empty(auth()->user()->provinsi_id))
                            <p class="text-slate-500 text-base inline">{{ $provinsi['province'] }}</p>
                        @endif --}}
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
                            <div>
                                <div class="flex items-center justify-between gap-2 mb-4">
                                    <label class="text-teal-500 font-semibold text-base">Pilih Kurir</label>
                                    <select wire:model="courier_id" wire:change="getOngkir" id="courier_id" class="p-2 px-2 w-40 border border-slate-300 rounded-md ring-slate-500 focus:ring-teal-400 focus:border-slate-200 text-slate-500">
                                        <option value="">-- Pilih Kurir --</option>
                                        <option value="jne">JNE</option>
                                        <option value="tiki">Tiki</option>
                                        <option value="pos">Pos Indonesia</option>
                                    </select>
                                </div>
                                <div wire:loading.delay class="alert bg-white shadow-md">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info flex-shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <span>Loading...</span>
                                    </div>
                                </div>
                                <div wire:loading.remove class="grid grid-cols-6 gap-2">
                                    @foreach ($result as $item)
                                        <div class="p-1 bg-white rounded-md shadow-md text-center col-span-3">
                                            <h1 class="text-slate-700 font-semibold text-sm">{{ $nama_jasa }}</h1>
                                            <p class="text-slate-500 text-sm">{{ $item['etd'] }}</p>
                                            <p class="text-slate-700 font-semibold text-sm">{{ $item['biaya'] }}</p>
                                            <button wire:click="saveOngkir({{ $item['biaya'] }})" class="w-full bg-teal-500 text-white font-semibold hover:bg-teal-600 transition-all duration-300 rounded-lg py-1 px-2">Pilih</button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="flex items-center justify-between gap-4 mt-3">
                                <div>
                                    <h1 class="text-slate-700 text-base">Total Harga ({{ $total_item }}) barang</h1>
                                </div>
                                <div>
                                    <h2 class="text-slate-700 text-base">Rp. {{ number_format($total_price) }}</h2>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center justify-between gap-2 mb-5">
                                <h1 class="text-slate-700 font-semibold text-lg">Total Tagihan</h1>
                                <h1 class="text-slate-700 font-semibold text-lg">Rp. {{ number_format($subtotal) }}</h1>
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
</div>
