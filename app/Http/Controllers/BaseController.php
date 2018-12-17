<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected $middleware = 'auth';

    public function index() {
        return view('Home');
    }

//    public function login() {
//        return view('login');
//    }
}
