<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function index() {
        return view('Home');
    }
}