<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{     public function create(Request $request)
    {
    $data=new Role();
    $data->name=$request->name;
    $data->save();
    return redirect()->back();

}

public function index()
{
$data=Role::all();
return view('role_index',['data'=>$data]);

}



}