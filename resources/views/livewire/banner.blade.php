@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

<div>
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
</div>
