<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
     
    public function index()
    {
        $result = User::all();

        if($result){
            $data['code'] = 200;
            $data['result'] = $result;
        } else {
            $data['code'] = 500;
            $data['result'] = 'Error';
        }
        return response()->json($data);
    }
     
    public function store(Request $request)
    {
        $result = User::create([
            'hobi' => $request->hobi,
            'asal' => $request->asal
        ]);

        if($result){
            $data['code'] = 200;
            $data['result'] = $result;
        } else {
            $data['code'] = 500;
            $data['result'] = 'Error';
        }
        return response($data);
    }
     
    public function show($id)
    {
        $result = User::where('id', $id)->first();

        if($result){
            $data['code'] = 200;
            $data['result'] = $result;
        } else {
            $data['code'] = 500;
            $data['result'] = 'Error';
        }
        return response()->json($data);
    }
    
    public function destroy($id)
    {
        $result = User::destroy('id', $id);

        if($result){
            $data['code'] = 200;
            $data['result'] = $result;
        } else {
            $data['code'] = 500;
            $data['result'] = 'Error';
        }
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $result = User::where('id',$id)->first();
        $result->tanggal_lahir = $request->input('tanggal_lahir');
        $result->asal = $request->input('asal');
        $result->password = Hash::make($request->input('password'));
        $result->save();

        if($result){
            $data['code'] = 200;
            $data['result'] = $result;
        } else {
            $data['code'] = 500;
            $data['result'] = 'Error';
        }
        return response()->json($data);
    }
}