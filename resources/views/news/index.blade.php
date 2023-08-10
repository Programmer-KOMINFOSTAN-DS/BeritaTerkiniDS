<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <a href="{{ route('news.create') }}" class="btn btn-success btn-sm ml-auto"><i
                        class="fas fa-plus"></i> &nbsp; + Tambah Berita</a>
            </div>
                    <div class="container">
                        @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                        @endif
    <table id="datatables" class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Sumber</th>
                <th>Aksi</th>               
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $no => $value )
            <tr>
                <td>{{$no+1}}</td> 
                <td>{{ $value->judul }}</td>
                
                <td><img src="{{ asset('gambarberita/'.$value->gambar) }}" alt="" style="width: 80px;"></td>
                <td>{{ $value->tanggal }}</td>
                <td>{{ $value->deskripsi }}</td>
                <td>{{ $value->sumber }}</td>               
                  <td>
                    <a href="/news/destroy/{{$value->id}}" class="btn btn-danger"> Hapus </a>      <a href="/news/edit/{{$value->id}}" class="btn btn-info"> Edit </a>
                   
                    
                </td> 
                
                
                        
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
