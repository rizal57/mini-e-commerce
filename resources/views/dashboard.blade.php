<x-app-layout>
    <div class="container lg:px-8 lg:my-4 mx-auto">
        {{-- Carousel start --}}
            <div class="carousel w-full overflow-hidden rounded-md">
                <div id="slide1" class="carousel-item relative w-full">
                <img src="https://source.unsplash.com/800x200?programming" class="w-full" />
                <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide4" class="btn btn-circle border-none text-slate-800 bg-slate-50 hover:bg-slate-50 hover:border-none">❮</a>
                    <a href="#slide2" class="btn btn-circle border-none text-slate-800 bg-slate-50 hover:bg-slate-50 hover:border-none">❯</a>
                </div>
                </div>
                <div id="slide2" class="carousel-item relative w-full">
                <img src="https://placeimg.com/800/200/arch" class="w-full" />
                <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide1" class="btn btn-circle">❮</a>
                    <a href="#slide3" class="btn btn-circle">❯</a>
                </div>
                </div>
                <div id="slide3" class="carousel-item relative w-full">
                <img src="https://placeimg.com/800/200/arch" class="w-full" />
                <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide2" class="btn btn-circle">❮</a>
                    <a href="#slide4" class="btn btn-circle">❯</a>
                </div>
                </div>
                <div id="slide4" class="carousel-item relative w-full">
                <img src="https://placeimg.com/800/200/arch" class="w-full" />
                <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide3" class="btn btn-circle">❮</a>
                    <a href="#slide1" class="btn btn-circle">❯</a>
                </div>
                </div>
            </div>
        {{-- Carousel start --}}
    </div>
</x-app-layout>
