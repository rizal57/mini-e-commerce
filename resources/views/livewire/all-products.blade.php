@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush
<div>
    <section class="product">
        <div class="container mx-auto px-8 py-4">
            {{-- searh start --}}
            <div class="lg:w-full mb-4">
                <div class="form-control">
                    <input wire:model="search" type="text" placeholder="Search products..." class="py-1 px-2 rounded-lg bg-white border-slate-300 placeholder:text-slate-300 focus:ring-blue-300 focus:border-slate-300 transition duration-300" />
                </div>
            </div>
            {{-- searh end --}}
            <div class="grid grid-cols-5 gap-4">
                @foreach ($products as $product)
                    <a href="{{ route('product.detail', $product) }}">
                        <div class="item">
                            <div class="rounded-lg overflow-hidden bg-white shadow-lg">
                                <figure class="overflow-hidden rounded-t-lg h-60">
                                    <img src="{{ asset('images/' . $product->gambar) }}" alt="Shoes" />
                                </figure>
                                <div class="text-sm text-slate-800 px-2 pb-2">
                                    <h1>{{ Str::limit($product->name, 50, '...') }}</h1>
                                    <h2 class="text-slate-900 font-bold text-lg">Rp. {{ number_format($product->price) }}</h2>
                                    <div class="flex flex-col gap-0.5">
                                        @if ($product->diskon)
                                            <x-diskon>{{ $product->diskon }}%</x-diskon>
                                        @endif
                                    </div>
                                    <div class="mt-2 flex items-center gap-2">
                                        <div class="text-teal-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <span class="text-base text-slate-800">Kediri</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    <section/>
</div>
