<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
            <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text" name="nama_lengkap" :value="old('nama_lengkap')"  />
            <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
        </div>

        

        <div>
            <x-input-label for="nik" :value="__('Nik')" />
            <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik" :value="old('nik')"  />
            <x-input-error :messages="$errors->get('nik')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="alamat" :value="__('Alamat')" />
            <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')"  />
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="provinsi" class="form-label" :value="__('Provinsi')" />
            <select type="text" id="provinsi" name="provinsi" class="form-control block font-medium text-sm text-gray-700 dark:text-gray-300">
                <option>PILIH PROVINSI...</option>
                @foreach ($provinces as $provinsi)
                    <option value="{{ $provinsi->id }}">{{$provinsi->name}}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('provinsi')" class="mt-2" />
        </div>

        <div>
            <x-input-label   for="kota_kabupaten" :value="__('Kota/Kabupaten')" />
             <select type="text" id="kota_kabupaten" name="kota_kabupaten" class="form-control mt-1 w-full block font-medium text-sm text-gray-700 dark:text-gray-300">
                                        <option>PILIH KABUPATEN...</option>      
                                    </select>
            <x-input-error :messages="$errors->get('kota_kabupaten')" class="mt-2" />
        </div>

       <!-- Email Address -->
       <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"/>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

        <div>
            <x-input-label for="no_telp" :value="__('No Telepon')" />
            <x-text-input id="no_telp" class="block mt-1 w-full" type="text" name="no_telp" :value="old('no_telp')"/>
            <x-input-error :messages="$errors->get('no_telp')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="justify-end mt-4">
           
            <div class="col-md-5">
                {!! NoCaptcha::display() !!}
                {!! NoCaptcha::renderJs() !!}
                @error('g-recaptcha-response')
                <span class="text-danger" color="red" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
