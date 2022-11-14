@push('style')
    @livewireStyles
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }
    </style>
@endpush

@push('script')
    @livewireScripts
@endpush

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
                            <input wire:model="selected" type="checkbox" class="checkbox checkbox-sm focus:ring-0" value="{{ $cart->id }}" name="selected" />
                        </div>
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
                            <div class="flex items-center gap-14">
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
                                    {{-- <input type="number" id="hide_input" wire:model="total_item"> --}}
                                    <div class="flex items-center justify-between gap-2">
                                        <button wire:click="minus({{ $cart->id }})" class="ring-2 ring-teal-500 text-teal-500 rounded-full p-1 w-6 h-6 flex items-center justify-center font-bold"><span class="">-</span></button>
                                        @if ($cart_id !== $cart->id)
                                            <div type="number" class="border-b-1 border-slate-200 border-t-0 border-r-0 border-l-0 ring-slate-500 focus:ring-teal-400 focus:border-slate-200 h-8 lg:w-16 text-center text-slate-500 pb-7"><span>{{ $cart->total_item }}</span></div>
                                        @endif

                                        @if ($cart_id === $cart->id)
                                            <input wire:model="total_item" value="{{ $total_item }}" type="number" class="p-2 px-2 border-b-1 border-slate-200 border-t-0 border-r-0 border-l-0 ring-slate-500 focus:ring-teal-400 focus:border-slate-500 h-8 lg:w-16 text-center text-slate-500 focus:ring-0">
                                        @endif
                                        <button wire:click="plus({{ $cart->id }})" class="ring-2 ring-teal-500 text-teal-500 rounded-full p-1 w-6 h-6 flex items-center justify-center font-bold">+</button>

                                        @if ($cart_id === $cart->id)
                                            {{-- update --}}
                                            <button wire:click="update({{ $cart->id }})" class="ring-2 ring-sky-500 text-sky-500 rounded-full p-1 w-6 h-6 flex items-center justify-center font-bold">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                                </svg>
                                            </button>
                                        @elseif ($cart_id !== $cart->id)
                                            {{-- show edit --}}
                                            <button wire:click="showEdit({{ $cart->id }})" class="ring-2 ring-yellow-500 text-yellow-500 rounded-full p-1 w-6 h-6 flex items-center justify-center font-bold">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                            </button>
                                        @endif
                                    </div>
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
                        <h1 class="text-slate-700 font-semibold text-lg">Ringkasan Belanja</h1>
                    </div>
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <h1 class="text-slate-700 text-base">Total Harga ({{ $total_item_selected }}) barang</h1>
                        </div>
                        <div>
                            <h2 class="text-slate-700 text-base">Rp.{{ number_format($total_price) }}</h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between gap-8 mb-5">
                        <h1 class="text-slate-700 font-semibold text-lg">Total Harga</h1>
                        @if ($subtotal > 0)
                            <h2 class="font-bold text-slate-700 text-xl">Rp. {{ number_format($subtotal) }}</h2>
                        @else
                            <h2 class="font-bold text-slate-700 text-xl">-</h2>
                        @endif
                    </div>
                    <div>
                        <button class="w-full bg-teal-500 text-white font-semibold hover:bg-teal-600 transition-all duration-300 rounded-lg py-2 px-4">Beli</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
