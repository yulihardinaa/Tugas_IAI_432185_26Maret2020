<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;

class TaskController extends Controller
{
    public function persegi(){
        $data['bilangan persegi'] = [];
        for($n = 1; $n< 41; $n++){
        $hasil = ($n * $n) ;
        $data['bilangan persegi'][] = $hasil ;
}      
        return response()->json($data);
    }
    
}