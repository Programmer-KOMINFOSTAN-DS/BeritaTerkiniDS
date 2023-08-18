<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
         Form Data Edit &raquo {{ $data->nama_lengkap }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   
                    <form class="w-full" action="/user/update/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                       
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                    Name
                                </label>
                                <input value="{{ old('nama_lengkap') ?? $data->nama_lengkap }}" name="nama_lengkap" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Nama Lengkap">
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                    Email
                                </label>
                                <input value="{{ old('email') ?? $data->email }}" name="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="email" placeholder="User Email">
                            </div>
                        </div>

                      
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                    Roles
                                </label>
                                <select name="roles" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name">
                                    <option value="{{ $data->roles }}">{{ $data->roles }}</option>
                                    <option disabled>-------</option>
                                    <option value="ADMIN">ADMIN</option>
                                    <option value="USER">USER</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary ml-3">Simpan</button>
                            
                        </div>
                    </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
