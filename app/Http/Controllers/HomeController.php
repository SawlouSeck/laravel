<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    public function index()
    {
        $candidat=Candidat::all();

        if (auth()->user()->is_admin ==1){
        return view('dashboard');
        }
        else

            return view('users.userHome',compact('candidat'));

    }
}



