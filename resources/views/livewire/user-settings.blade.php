@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

<div>
    <div class="container px-24 mx-auto py-8">
        <div class="mb-4">
            <h1 class="text-slate-700 font-semibold text-lg">User Settings</h1>
        </div>
        <div class="flex gap-8">
            <div class="text-center shadow-md rounded-md p-4">
                {{-- image-start --}}
                <div class="lg:w-72 lg:h-72 rounded-md overflow-hidden object-cover bg-cover mb-4">
                    <img src="https://placeimg.com/288/288/people" />
                </div>

                <input type="file" name="" class="file-input file-input-md w-full max-w-xs">
                {{-- image-end --}}
                {{-- change password start --}}
                <div class="mt-4">
                    <button class="py-3 px-4 rounded-md border w-full text-slate-700 font-semibold text-base">Ubah Kata Sandi</button>
                </div>
                {{-- change password end --}}
            </div>
            <div class="p-4 w-full shadow-md rounded-md">
                <div class="border-b pb-4 mb-4">
                    @if ($id_user === auth()->user()->id)
                        <button wire:click="updateUser" class="btn btn-sm bg-teal-500 border-none text-white font-semibold hover:bg-teal-600 rounded-md">Simpan</button>
                    @else
                        <button wire:click="showUserForm" class="btn btn-sm bg-teal-500 border-none text-white font-semibold hover:bg-teal-600 rounded-md">Ubah</button>
                    @endif
                </div>
                <div>
                    <div class="text-slate-500 flex mb-4">
                        <span class="lg:w-40 inline-block">Nama</span>
                        @if ($id_user === auth()->user()->id)
                            <span class="pr-4">
                                <input wire:model="nama" type="text" class="input input-sm border-teal-500 focus:ring-teal-500 focus:border-slate-400 focus:outline-0 rounded-md w-full mr-4">
                            </span>
                        @else
                            <span class="pr-4">{{ auth()->user()->name }}</span>
                        @endif
                    </div>
                    <div class="text-slate-500 flex mb-4">
                        <span class="lg:w-40 inline-block">Nomer HP</span>
                        @if ($id_user === auth()->user()->id)
                            <span class="pr-4">
                                <input wire:model="phone_number" type="text" class="input input-sm border-teal-500 focus:ring-teal-500 focus:border-slate-400 focus:outline-0 rounded-md w-full mr-4">
                            </span>
                        @else
                            <span class="pr-4">{{ auth()->user()->phone_number }}</span>
                        @endif
                    </div>
                    <div class="text-slate-500 flex mb-4">
                        <span class="lg:w-40 inline-block">Alamat</span>
                        @if ($id_user === auth()->user()->id)
                            <span class="pr-4">
                                <textarea wire:model="address" class="textarea lg:w-60 resize-none border-teal-500 focus:ring-teal-500 focus:border-slate-400 focus:outline-0 rounded-md max-w-full mr-4"></textarea>
                            </span>
                        @else
                            <span class="pr-4">{{ auth()->user()->address }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
