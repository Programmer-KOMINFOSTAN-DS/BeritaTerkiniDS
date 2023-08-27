<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('HALAMAN KOMENTAR') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
             
                    <div class="container">
                        @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                        @endif
                        <table id="datatables" class="table table-bordered data-table ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                
                                    <th>News ID</th>
                                    <th>User ID</th>
                                    <th>Nama</th>
                                    <th>Komentar</th>
                                    <th>Klasifikasi</th>
                                    <th>Nilai Sentimen</th>
                                </tr>
                            </thead>
                            <tbody>
        
                                @foreach ($komentar as $no =>  $comment)
                                    <tr>
                                        <td>{{ $no+1 }}</td>
                                      
                                        <td>{{ $comment->news_id }}</td>
                                        <td>{{ $comment->user_id }}</td>
                                        <td>{{ $comment->nama }}</td>
                                        <td>{{ $comment->komentar }}</td>
                                        <td>{{ $comment->klasifikasi }}</td>
                                        <td>{{ $comment->nilaisentimen }}</td>
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
