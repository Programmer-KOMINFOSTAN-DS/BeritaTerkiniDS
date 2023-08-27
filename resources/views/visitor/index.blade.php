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
                <th>Ip Address</th>
                <th>DATE</th>
                           
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $no => $value )
            <tr>
                <td>{{$no+1}}</td> 
                <td>{{ $value->ip_address }}</td>
                <td>{{ $value->created_at }}</td>
                
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
