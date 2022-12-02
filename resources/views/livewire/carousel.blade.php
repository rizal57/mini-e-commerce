<div>
    @push('style')
        @livewireStyles
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    @endpush
    <div>
        <div id="carousel" class="owl-carousel owl-theme rounded-lg overflow-hidden mb-4">
            <div id="slide1" class="carousel-item relative w-full h-40 lg:h-[370px] bg-cover">
                <img src="{{ asset('images/banner4.jpg') }}" class="w-full object-cover" />
            </div>
            <div id="slide1" class="carousel-item relative w-full h-40 lg:h-[370px] bg-cover">
                <img src="{{ asset('images/banner2.jpg') }}" class="w-full object-cover" />
            </div>
            <div id="slide1" class="carousel-item relative w-full h-40 lg:h-[370px] bg-cover">
                <img src="{{ asset('images/banner1.jpg') }}" class="w-full object-cover" />
            </div>
        </div>
    </div>
    @push('script')
        @livewireScripts
        <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script>
            var owl = $('#carousel');
                owl.owlCarousel({
                    items:1,
                    loop:true,
                    margin:10,
                    autoplay:true,
                    autoplayTimeout:5000,
                    autoplayHoverPause:true,
                    dots:false
                });
                $('.play').on('click',function(){
                    owl.trigger('play.owl.autoplay',[1000])
                })
                $('.stop').on('click',function(){
                    owl.trigger('stop.owl.autoplay')
                })
        </script>
    @endpush
</div>
