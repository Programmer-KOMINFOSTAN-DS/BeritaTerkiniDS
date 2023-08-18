<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          Form Edit Password &raquo {{ $data->nama_lengkap }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   
                    <form class="w-full" action="/user/updatepassword/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                    
                                </label>
                                <input type="password" name="password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name"  placeholder="User Password">
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
