@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

<div class="container px-4 mx-auto mt-8">
    @if (session()->has('success'))
        <div class="py-2 px-4 alert rounded-md mb-4 lg:-mt-4 lg:max-w-md mx-auto bg-teal-500 text-white font-semibold shadow-lg">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{ session('success') }}</span>
            </div>
            <div class="flex-none">
                <a href="{{ route('cart') }}" class="btn btn-xs bg-slate-500 hover:bg-slate-700 border-none">See</a>
            </div>
        </div>
    @endif

    <div class="card lg:card-side bg-white rounded-md justify-between gap-4">
        <div class="relative">
            <figure>
                <img src="{{ asset('images/' . $product->gambar) }}" alt="Album" class="w-[400px] rounded-md top-0 left-0"/>
            </figure>
        </div>
        <div class="lg:max-w-md">
            {{-- <form> --}}
                <h2 class="text-sltae-800 font-bold text-2xl">{{ $product->name }}</h2>
                <div class="star-rating flex items-center gap-2 mb-3">
                    <p class="text-slate-500 text-base">Terjual <span class="text-slate-800 font-semibold text-base">5 rb+ .</span></p>
                    <span>
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Rating star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <p class="ml-2 text-sm font-bold text-gray-900 dark:text-white">4.95</p>
                            <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
                            <a href="#" class="text-sm font-medium text-gray-900 underline hover:no-underline dark:text-white">2.245 rating</a>
                        </div>
                    </span>
                </div>
                <div class="price">
                    <h3 class="text-slate-800 font-bold text-3xl mb-1">Rp. {{ number_format($product->price) }}</h3>
                    @if ($product->diskon)
                        <x-diskon>
                            {{ $product->diskon }}%
                        </x-diskon>
                    @endif
                </div>

                <div class="mt-4 border-b py-1 mb-2">
                    <h2 class="text-teal-500 text-base font-semibold">Detail</h2>
                </div>
                <div class="text-slate-500 text-sm">
                    <p>Kondisi: <span class="text-slate-900 font-semibold">{{ $product->condition }}</span></p>
                    <p>Berat Satuan: <span class="text-slate-900 font-semibold">{{ $product->weight }} kg</span></p>
                    <p>Kategori: <span class="text-teal-500 font-semibold">{{ $product->category->name }}</span></p>
                    <p>Etalase: <span class="text-teal-500 font-semibold">Gaming Chair</span></p>
                </div>
                <div class="text-slate-700 max-w-md text-base mt-3">
                    <p>
                        {!! $product->description !!}
                    </p>
                </div>
                </div>

                <div class="ml-8 border rounded-lg p-4">
                <div>
                    <h2 class="text-slate-700 font-bold text-lg py-2">Pengiriman</h2>
                    <div class="flex gap-2 text-slate-500">
                        <div class="mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                        </div>
                        <div>
                            <div>Dikirm dari <span class="font-semibold">Kediri</span></div>
                            
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <h2 class="text-slate-700 font-bold text-lg py-2">Atur jumlah dan catatan</h2>
                    <div class="flex items-center gap-4 text-base">
                        <div>
                            <input wire:model="total_item" wire:change="change_total_itam" id="total_item" type="number" class="p-2 px-2 border border-slate-300 rounded-md ring-slate-500 focus:ring-teal-400 focus:border-slate-200 h-8 w-20 text-slate-500">
                        </div>
                        <div>
                            <p>Jumlah Stok: <span class="text-slate-800 font-semibold">80</span></p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between mt-4">
                        <div>
                            <p class="text-slate-700 text-base">Subtotal</p>
                        </div>
                        <div>
                            <input type="hidden" wire:model="total_price">
                            <p class="text-slate-800 font-bold text-lg">
                                @if ($total_price == 0)
                                    Rp. {{ number_format($product->price) }}
                                @elseif ($total_price > 0)
                                    Rp. {{ number_format($total_price) }}
                                @endif
                            </p>
                        </div>
                    </div>
                    {{-- button --}}
                    <div class="mt-6">
                        <button wire:click="addToCart" id="addToCart" class="bg-teal-500 text-white font-semibold py-2 px-4 rounded-md w-full">+ Keranjang</button>
                    </div>
                </div>
            {{-- </form> --}}
            </div>
        </div>
</div>
