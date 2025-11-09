<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Age -->
        <div class="mt-4">
            <x-input-label for="age" :value="__('Usia')" />
            <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" required min="1" max="100" />
            <x-input-error :messages="$errors->get('age')" class="mt-2" />
        </div>

        <!-- Instance -->
        <div class="mt-4">
            <x-input-label for="instance" :value="__('Instansi')" />
            <x-text-input id="instance" class="block mt-1 w-full" type="text" name="instance" :value="old('instance')" required />
            <x-input-error :messages="$errors->get('instance')" class="mt-2" />
        </div>

        <!-- Ethnicity -->
        <div class="mt-4">
            <x-input-label for="ethnicity" :value="__('Suku')" />
            <select id="ethnicity" name="ethnicity" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option value="">Pilih Suku</option>
                <option value="Jawa" {{ old('ethnicity') == 'Jawa' ? 'selected' : '' }}>Jawa</option>
                <option value="Sunda" {{ old('ethnicity') == 'Sunda' ? 'selected' : '' }}>Sunda</option>
                <option value="Batak" {{ old('ethnicity') == 'Batak' ? 'selected' : '' }}>Batak</option>
                <option value="Minang" {{ old('ethnicity') == 'Minang' ? 'selected' : '' }}>Minang</option>
                <option value="Betawi" {{ old('ethnicity') == 'Betawi' ? 'selected' : '' }}>Betawi</option>
                <option value="Madura" {{ old('ethnicity') == 'Madura' ? 'selected' : '' }}>Madura</option>
                <option value="Melayu" {{ old('ethnicity') == 'Melayu' ? 'selected' : '' }}>Melayu</option>
                <option value="Bugis" {{ old('ethnicity') == 'Bugis' ? 'selected' : '' }}>Bugis</option>
                <option value="Bali" {{ old('ethnicity') == 'Bali' ? 'selected' : '' }}>Bali</option>
                <option value="Lainnya" {{ old('ethnicity') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
            <x-input-error :messages="$errors->get('ethnicity')" class="mt-2" />
        </div>

        <!-- Occupation -->
        <div class="mt-4">
            <x-input-label for="occupation" :value="__('Pekerjaan')" />
            <select id="occupation" name="occupation" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option value="">Pilih Pekerjaan</option>
                <option value="Pelajar/Mahasiswa" {{ old('occupation') == 'Pelajar/Mahasiswa' ? 'selected' : '' }}>Pelajar/Mahasiswa</option>
                <option value="Pegawai Negeri" {{ old('occupation') == 'Pegawai Negeri' ? 'selected' : '' }}>Pegawai Negeri</option>
                <option value="Pegawai Swasta" {{ old('occupation') == 'Pegawai Swasta' ? 'selected' : '' }}>Pegawai Swasta</option>
                <option value="Wiraswasta" {{ old('occupation') == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                <option value="Profesional" {{ old('occupation') == 'Profesional' ? 'selected' : '' }}>Profesional</option>
                <option value="Ibu Rumah Tangga" {{ old('occupation') == 'Ibu Rumah Tangga' ? 'selected' : '' }}>Ibu Rumah Tangga</option>
                <option value="Lainnya" {{ old('occupation') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
            <x-input-error :messages="$errors->get('occupation')" class="mt-2" />
        </div>

        <!-- Gender -->
        <div class="mt-4">
            <x-input-label for="gender" :value="__('Jenis Kelamin')" />
            <select id="gender" name="gender" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Laki-laki</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Perempuan</option>
                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Lainnya</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
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

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Sudah punya akun? Login') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>