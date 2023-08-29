<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('HALAMAN USER') }}
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
    <table id="datatables" class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Email Verified At</th>            
                <th>Created At</th>           
                <th>Roles</th>           
                <th>Status</th>          
                <th>Aksi</th>               
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $no => $value )
            <tr>
                <td>{{$no+1}}</td> 
                <td>{{ $value->nama_lengkap }}</td>
                
                
                <td >{{ $value->email }}</td>
                <td>{{ $value->email_verified_at ?? 'Not Verified' }}</td>
                <td >{{ $value->created_at }}</td>
                <td>{{ $value->roles }}</td>
                <td>
                    <a href="/user/status/update/{{$value->id}}" class="btn btn-sm btn-{{ $value->status ? 'success' : 'danger' }}">
                        
                        {{ $value->status ? 'Enable' : 'Disable' }}</a>
                </td>
                  <td>
                    <a href="/user/destroy/{{$value->id}}" class="btn btn-danger"> Hapus </a>   <a href="/user/edit/{{$value->id}}" class="btn btn-info"> Edit </a>    <a href="/user/editpassword/{{$value->id}}" class="btn btn-warning"> Edit Password </a>         
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
