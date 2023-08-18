<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Yajra\DataTables\Datatables;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Services\DataTable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = User::limit(100)->get();
        return view('user.index',compact('data'));
   
    }
    public function json()
    {
        return DataTables::of(User::limit(10))->make(true);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::findOrFail($id);

        // dd($data);

        return view('user.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
            $data = User::find($id);
            $data->update([
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'roles' => $request->roles,
                'password' => Hash::make($request->password)
               
                
            ]);
            return redirect()->route('user.index')->with('success', 'Data User Berhasil Diubah');
        

        }


        public function editpassword(string $id)
        {
            $data = User::findOrFail($id);
    
            // dd($data);
    
            return view('user.editpassword', compact('data'));
        }

        public function updatepassword(Request $request, string $id)
        {
           
                $data = User::find($id);
                $data->update([                  
                    'password' => Hash::make($request->password)
                                     
                ]);
                return redirect()->route('user.index')->with('success','Password ->  ' . $data->email . ' <- berhasil diubah.');
            
    
            }

    public function status($userId){

        $user = User::find($userId);

        if($user){
            if($user->status){
                $user->status = 0;
            }   
            else{
            $user->status =1;
        }
        
        $user->save();
    }
         return back();
   

    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post   = User::find($id);
        $post->delete();

        return redirect()->route('user.index')->with('success', 'Data Berhasil Dihapus');
    }
}
