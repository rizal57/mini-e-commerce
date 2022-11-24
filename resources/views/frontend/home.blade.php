<x-app-layout>
    <div class="container px-4">
        <div class="lg:px-8 lg:my-4 mx-auto">
            @if (session()->has('success'))
                <div class="py-2 px-4 alert rounded-md mb-4 lg:mt-4 lg:max-w-md mx-auto bg-teal-500 text-white font-semibold shadow-lg">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                    <div class="flex-none">
                        <a href="{{ route('cart') }}" class="btn btn-xs bg-slate-500 hover:bg-slate-700 border-none">See</a>
                    </div>
                </div>
            @endif
            <livewire:carousel />
            <livewire:information />
            <livewire:products />
            <livewire:banner />
            <livewire:new-products />
        </div>
    </div>
</x-app-layout>
