<?php

namespace App\Http\Controllers;
use App\Models\Phone;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    //
    public function home(){
    $list_phone = Phone::all();

    
        return view('home', [
            'list_phone' => $list_phone,
        ]);
    }
};
