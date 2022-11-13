@push('style')
    @livewireStyles
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
@endpush

@push('script')
    @livewireScripts
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
@endpush

<div>
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
</div>
