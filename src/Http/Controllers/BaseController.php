<?php

namespace Laraverse\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index(Request $request)
    {
        return view('laraverse::pages.index');
    }
}
