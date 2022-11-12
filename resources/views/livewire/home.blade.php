<style>
    .item {
        padding: 1rem 0 1rem 0;
    }

    .carousel-wrapper {
        position: relative;
    }
    .owl-carousel .owl-nav {
        overflow: hidden;
        height: 0px;
    }
    .owl-carousel .nav-button {
        display: flex!important;
        align-items: center!important;
        justify-content: center!important;
        margin: auto!important;
        background: white!important;
        font-size: 2rem!important;
        box-shadow: 0 0 4px rgba(46, 46, 46, 0.4)!important;
        color: rgb(34, 34, 34)!important;
        height: 30px!important;
        width: 30px!important;
        border-radius: 100%!important;
        cursor: pointer;
        position: absolute;
        top: 50%;
        transform: translateY(-50%)
    }
    .owl-carousel .owl-prev {
        left: 15px;
        opacity: 0;
        transition: ease-in-out .3s;
    }
    .owl-carousel .owl-next {
        right: 15px;
        opacity: 0;
        transition: ease .3s;
    }
    .carousel-wrapper:hover .owl-carousel .owl-prev {
        opacity: inherit;
        left: -15px;
    }
    .carousel-wrapper:hover .owl-carousel .owl-next {
        opacity: inherit;
        right: -15px;
    }
    .carousel-wrapper:hover .owl-carousel .owl-prev.disabled,
    .carousel-wrapper:hover .owl-carousel .owl-next.disabled {
        display: none;
    }
    .owl-theme .owl-nav [class*=owl-] {
        color: #ffffff;
        font-size: 39px;
        background: #000000;
        border-radius: 3px;
    }
    .owl-carousel .prev-carousel:hover {
        background-position: 0px -53px;
    }
    .owl-carousel .next-carousel:hover {
        background-position: -24px -53px;
    }
</style>
<div class="container px-4">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

    <div class="lg:px-8 lg:my-4 mx-auto">
        {{-- Carousel start --}}
        <div class="mb-4">
            <x-carousel>
                <div id="slide1" class="carousel-item relative w-full h-40 lg:h-[370px] bg-cover">
                    <img src="{{ asset('images/banner4.jpg') }}" class="w-full object-cover" />
                </div>
                <div id="slide1" class="carousel-item relative w-full h-40 lg:h-[370px] bg-cover">
                    <img src="{{ asset('images/banner2.jpg') }}" class="w-full object-cover" />
                </div>
                <div id="slide1" class="carousel-item relative w-full h-40 lg:h-[370px] bg-cover">
                    <img src="{{ asset('images/banner1.jpg') }}" class="w-full object-cover" />
                </div>
            </x-carousel>
        </div>
        {{-- Carousel start --}}

        {{-- card start --}}
        <div class="flex flex-wrap justify-between items-center gap-4">
            <div class="card bg-white text-slate-500 shadow-md w-full lg:w-auto text-base">
                <div class="card-body items-center text-center">
                    <span class="text-slate-700">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                        </svg>
                    </span>
                    <h2 class="card-title text-base font-bold uppercase text-slate-700">Pengiriman cepat</h2>
                    <p class="text-sm text-slate-500">Kurir pengiriman yang handal.</p>
                </div>
            </div>

            <div class="card bg-white text-slate-500 shadow-md w-full lg:w-auto text-base">
                <div class="card-body items-center text-center">
                    <span class="text-slate-700">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                        </svg>
                    </span>
                    <h2 class="card-title text-base font-bold uppercase text-slate-700">Kualitas Terjamin</h2>
                    <p class="text-sm text-slate-500">Garansi 3 bulan.</p>
                </div>
            </div>

            <div class="card bg-white text-slate-500 shadow-md w-full lg:w-auto text-base">
                <div class="card-body items-center text-center">
                    <span class="text-slate-700">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                            <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                            <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                        </svg>
                    </span>
                    <h2 class="card-title text-base font-bold uppercase text-slate-700">Pembayaran Mudah</h2>
                    <p class="text-sm text-slate-500">Tersedia berbagai metode pembayaran.</p>
                </div>
            </div>

            <div class="card bg-white text-slate-500 shadow-md w-full lg:w-auto text-base">
                <div class="card-body items-center text-center">
                    <span class="text-slate-700">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-hearts" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.5 1.246c.832-.855 2.913.642 0 2.566-2.913-1.924-.832-3.421 0-2.566ZM9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4Zm13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276ZM15 2.165c.555-.57 1.942.428 0 1.711-1.942-1.283-.555-2.281 0-1.71Z"/>
                        </svg>
                    </span>
                    <h2 class="card-title text-base font-bold uppercase text-slate-700">Admin bersahabat</h2>
                    <p class="text-sm text-slate-500">Admin ramah dan edukatif.</p>
                </div>
            </div>
        </div>
        {{-- card end --}}

        {{-- products start --}}
        <section class="product">
            <div class="mt-10 w-full flex items-center justify-between">
                <div>
                    <h1 class="text-lg text-slate-800 font-bold uppercase">Produk Kami</h1>
                </div>
                <div class="kategori">
                    <div>
                        <ul class="flex gap-4 items-center">
                            @foreach ($categories as $category)
                                <li class="text-slate-500 hover:text-teal-500 transition-all duration-300">
                                    <a href="#">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{-- card product start --}}
            <div class="carousel-wrapper">
                <div class="owl-carousel owl-theme" id="product-card">
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
            {{-- card product end --}}
        </section>
        {{-- products end --}}

        {{-- banner start --}}
        <section id="banner" class="banner mt-4">
            <div class="flex gap-3 items-center justify-between">
                <div class="overflow-hidden rounded-lg bg-cover">
                    <img src="{{ asset('images/banner1.jpg') }}" alt="" class="object-cover">
                </div>
                <div class="overflow-hidden rounded-lg bg-cover">
                    <img src="{{ asset('images/banner4.jpg') }}" alt="" class="object-cover">
                </div>
            </div>
        </section>
        {{-- banner end --}}

        {{-- products terbaru start --}}
        <section class="product">
            <div class="mt-10 w-full flex items-center justify-between">
                <div>
                    <h1 class="text-lg text-slate-800 font-bold uppercase">Produk Terbaru</h1>
                </div>
            </div>

            <div class="carousel-wrapper">
                <div class="owl-carousel owl-theme" id="product-terbaru-card">
                    @foreach ($new_products as $product)
                    <a href="{{ route('product.detail', $product->slug) }}">
                        <div class="item">
                            <div class="rounded-lg overflow-hidden bg-white shadow-lg">
                                <figure class="overflow-hidden rounded-t-lg h-60">
                                    <img src="{{ asset('images/' . $product->gambar) }}" alt="Shoes" />
                                </figure>
                                <div class="text-sm text-slate-800 px-2 pb-2">
                                    <h1>{{ Str::limit($product->name, 50, '...') }}</h1>
                                    <h2 class="text-slate-900 font-bold text-lg">Rp. {{ $product->price }}</h2>
                                    @if ($product->diskon)
                                        <x-diskon>{{ $product->diskon }}%</x-diskon>
                                    @endif
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
        </section>
        {{-- products terbaru end --}}
    </div>

    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>


    <script>
        $('#product-card').owlCarousel({
            margin: 15,
            loop:false,
            nav: true,
            dots:false,
            navText: ["<div class='nav-button owl-prev'>‹</div>", "<div class='nav-button owl-next'>›</div>"],
            responsive: {
                0: {
                items: 1
                },
                600: {
                items: 3
                },
                1000: {
                items: 5
                }
            }
        });
        $('#product-terbaru-card').owlCarousel({
            margin: 15,
            loop:false,
            nav: true,
            dots:false,
            navText: ["<div class='nav-button owl-prev'>‹</div>", "<div class='nav-button owl-next'>›</div>"],
            responsive: {
                0: {
                items: 1
                },
                600: {
                items: 3
                },
                1000: {
                items: 5
                }
            }
        });
    </script>
</div>
