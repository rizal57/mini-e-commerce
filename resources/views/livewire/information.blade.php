@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush
<div>
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
</div>
