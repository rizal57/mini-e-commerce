@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

<div>
    <div class="container px-24 mx-auto py-8">
        @if (session()->has('failed'))
            <div class="py-2 px-4 alert rounded-md mb-4 lg:-mt-4 lg:max-w-md mx-auto bg-rose-500 text-white font-semibold shadow-lg">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                    <span>{{ session('failed') }}</span>
                </div>
            </div>
        @endif
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
                        <button wire:click="showUserForm" class="btn btn-sm bg-sky-500 border-none text-white font-semibold hover:bg-sky-600 rounded-md">Ubah</button>
                    @endif
                </div>
                <div class="lg:max-w-md">
                    <div class="text-slate-500 flex mb-4">
                        <span class="lg:w-40 inline-block">Nama</span>
                        @if ($id_user === auth()->user()->id)
                            <span class="pr-4">
                                <input wire:model="nama" type="text" class="input lg:w-72 border-teal-500 focus:ring-teal-500 focus:border-slate-400 focus:outline-0 rounded-md w-full">
                            </span>
                        @else
                            <span class="pr-4">{{ auth()->user()->name }}</span>
                        @endif
                    </div>
                    <div class="text-slate-500 flex mb-4">
                        <span class="lg:w-40 inline-block">Nomer HP</span>
                        @if ($id_user === auth()->user()->id)
                            <span class="pr-4">
                                <input wire:model="phone_number" type="text" class="input lg:w-72 border-teal-500 focus:ring-teal-500 focus:border-slate-400 focus:outline-0 rounded-md w-full">
                            </span>
                        @else
                            <span class="pr-4">{{ auth()->user()->phone_number }}</span>
                        @endif
                    </div>
                    <div class="text-slate-500 flex mb-4">
                        <span class="lg:w-40 inline-block">Alamat</span>
                        @if ($id_user === auth()->user()->id)
                            <span class="pr-4">
                                <textarea wire:model="address" class="textarea lg:w-72 resize-none border-teal-500 focus:ring-teal-500 focus:border-slate-400 focus:outline-0 rounded-md w-full"></textarea>
                            </span>
                        @else
                            <span class="pr-4 lg:w-72">{{ auth()->user()->address }}</span>
                        @endif
                    </div>
                    <div class="text-slate-500 flex mb-4">
                        <span class="lg:w-40 inline-block">Provinsi</span>
                        @if ($id_user === auth()->user()->id)
                            <span class="pr-4">
                                <select wire:model="provinsi_id" class="select lg:w-72 border-teal-500 focus:ring-teal-500 focus:border-slate-400 focus:outline-0 rounded-md w-full">
                                    <option value="">Pilih Provinsi</option>
                                    @forelse ($daftarProvinsi as $provinsi)
                                        <option value="{{ $provinsi['province_id'] }}">{{ $provinsi['province'] }}</option>
                                    @empty
                                        <option>Provinsi tidak ditemukan</option>
                                    @endforelse
                                </select>
                            </span>
                        @else
                            <span class="pr-4">{{ $province['province'] }}</span>
                        @endif
                    </div>
                    <div class="text-slate-500 flex mb-4">
                        <span class="lg:w-40 inline-block">Kota</span>
                        @if ($id_user === auth()->user()->id)
                            <span class="pr-4">
                                <select wire:model="kota_id" class="select lg:w-72 border-teal-500 focus:ring-teal-500 focus:border-slate-400 focus:outline-0 rounded-md w-full" @if(!$provinsi_id) disabled @endif>
                                    @if ($provinsi_id)
                                        @forelse ($daftarKota as $kota)
                                            <option value="{{ $kota['city_id'] }}">{{ $kota['city_name'] }}</option>
                                        @empty
                                            <option>Kota tidak ditemukan</option>
                                        @endforelse
                                    @else
                                        <option value="">Pilih Kota</option>
                                    @endif
                                </select>
                            </span>
                        @else
                            <span class="pr-4">{{ $city_name['city_name'] }}</span>
                        @endif
                    </div>
                    <div class="flex justify-end">
                        @if ($id_user === auth()->user()->id)
                            <button wire:click="updateUser" class="btn btn-sm bg-teal-500 border-none text-white font-semibold hover:bg-teal-600 rounded-md">Simpan</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
