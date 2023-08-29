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
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Judul Berita</th>
                                    <th rowspan="2">User ID</th>
                                    <th rowspan="2">Nama</th>
                                    <th rowspan="2">Komentar</th>
                                    <th rowspan="2">Klasifikasi</th>
                                    <th colspan="3">Nilai Sentimen</th>
                                    <th rowspan="2">Tanggal</th>
                                    <th rowspan="2">Aksi</th>
                                </tr>
                                 <tr>
                                <th>Positif</th>
                                <th>Negatif</th>
                                <th>Netral</th>
                            </tr>
                            </thead>
                            <tbody>
                                 
                                @foreach ($komentar as $no => $comment)
                                    <tr>
                                        <td>{{ $no+1 }}</td>
                                        <td>{{ $comment->news->judul }}</td>
                                        <td>{{ $comment->user_id }}</td>
                                        <td>{{ $comment->nama }}</td>
                                        <td>{{ $comment->komentar }}</td>
                                        <td>{{ $comment->klasifikasi }}</td>
                                        @php
                                        $scores = json_decode($comment->nilaisentimen, true);
                                        @endphp
                                        <td>{{ isset($scores['positif']) ? $scores['positif'] : '' }}</td>
                                        <td>{{ isset($scores['negatif']) ? $scores['negatif'] : '' }}</td>
                                        <td>{{ isset($scores['netral']) ? $scores['netral'] : '' }}</td>
                                        <td>{{ $comment->created_at}}</td>
                                        <td>
                                        <a href="/komentar/destroy/{{$comment->id}}" class="btn btn-danger"> Hapus </a>      
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
  <script>
    $(document).ready(function () {
        $('#datatables').DataTable();
    });
</script>
</x-app-layout>
