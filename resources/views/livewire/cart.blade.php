<div class="container px-24 mx-auto py-8">
    <div class="mb-3">
        <h1 class="text-slate-800 font-semibold text-xl">Keranjang</h1>
    </div>
    <div class="flex justify-between">
        <div class="flex-1 gap-2 mr-3">
            @if (count($carts) > 0)
                @foreach ($carts as $cart)
                <div class="mb-3 rounded-md shadow-md p-3">
                    <div class="flex gap-2">
                        <div>
                            <img src="{{ asset('images/' . $cart->product->gambar) }}" alt="{{ $cart->product->name }}" class="lg:w-20 rounded-md">
                        </div>
                        <div class="lg:max-w-md">
                            <h1 class="text-base text-slate-700 mb-1">{{ $cart->product->name }}</h1>
                            <h2 class="text-slate-800 font-bold text-base">Rp. {{ number_format($cart->total_price) }}</h2>
                        </div>
                        <div></div>
                    </div>
                    <div class="mt-3 flex justify-between items-center">
                        <div>
                            <a href="#" class="text-teal-500 hover:text-teal-600 transition-all duration-300 text-xs">Tulis Catatan</a>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <div>
                                    <button wire:click="deleteCart({{ $cart->id }})" class="text-rose-500 hover:text-slate-500 transition-all duration-300 block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </button>
                                </div>
                                {{-- amount --}}
                                <div>
                                    <input type="hidden" wire:model="total_item">
                                    <input type="number" value="{{ $cart->total_item }}" class="p-2 px-2 border border-slate-300 rounded-md ring-slate-500 focus:ring-teal-400 focus:border-slate-200 h-8 w-20 text-slate-500">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="p-4 rounded-md bg-white shadow-md">
                    <h1 class="text-teal-500 text-lg font-semibold text-center">Keranjang masih kosong</h1>
                </div>
            @endif
        </div>
        <div>
            <div class="p-4 rounded-md shadow-md">
                <div class="border-b border-b-slate-300 py-4 mb-4">
                    <div class="mb-4">
                        <h1 class="text-slate-800 font-semibold text-lg">Ringkasan Belanja</h1>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-slate-500 text-base">Total Harga</h1>
                        </div>
                        <div>
                            <h2 class="text-slate-500 text-base">Rp.0</h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between gap-8 mb-5">
                        <h1 class="text-slate-800 font-semibold text-lg">Total Harga</h1>
                        <h2 class="font-bold text-slate-800 text-xl">Rp. 10.000.000</h2>
                    </div>
                    <div>
                        <button class="w-full bg-teal-500 text-white font-semibold hover:bg-teal-600 transition-all duration-300 rounded-lg py-2 px-4">Beli</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
