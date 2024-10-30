<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller

    {     public function create(Request $request)
        {
        $data=new Permission();
        $data->name=$request->name;
        $data->save();
        return redirect()->back();

    }

    public function index()
    {
    $data=Permission::all();
    return view('permission_index',['data'=>$data]);

    }

}
