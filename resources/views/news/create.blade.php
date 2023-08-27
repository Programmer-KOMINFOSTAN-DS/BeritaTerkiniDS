<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="card-body">
                        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-3">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" class="form-control mt-2" id="judul"
                                    placeholder="Enter judul Berita">
                            </div>
                            <div class="form-group mt-3">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control mt-2" id="tanggal">
                            <div class="form-group mt-3">
                                <label for="gambar">Gambar</label>
                                <input type="file" name="gambar" class="form-control mt-2">
                            </div>
                            <div class="form-group mt-3">
                                <label for="deskripsi">Deskripsi</label>
                                <input type="text" name="deskripsi" class="form-control mt-2" id="deskripsi"
                                    placeholder="Enter deskripsi Berita">
                            </div>
                            <div class="form-group mt-3">
                                <label for="sumber">Sumber</label>
                                <input type="text" name="sumber" class="form-control mt-2" id="sumber"
                                    placeholder="Enter sumber Berita">
                            </div>
                            
                            <div class="form-group mt-3">
                                <button class="btn btn-info btn-lg btn-block" type="submit">Tambah</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
