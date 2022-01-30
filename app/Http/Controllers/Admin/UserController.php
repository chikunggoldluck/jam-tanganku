<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{    
    public function index() 
	{ 
		$users = DB::table('users')->get();
		
		return view('index',['users' => $users]); 
	}

	public function tambah()
	{
	return view('tambah');
	}

	public function store(Request $request)
	{
		DB::table('users')->insert([
			'name' => $request->name,
            'email' => $request->email,
        
		]);

		return redirect('/users');
	}

	public function edit($id)
	{
		$users=DB::table('users')->where('id',$id)->get();
			
		return view('edit',['users'=> $users]);
	}

	public function update(request $request){
		DB::table('users')->where('id',$request->id)->update([
			'name' => $request->name,
            'email' => $request->email,
            
		]);

		return redirect('/users');
	}

  public function hapus($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return redirect('/users');
    }

}
