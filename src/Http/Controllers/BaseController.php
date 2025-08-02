<?php

namespace Laraverse\Http\Controllers;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laraverse\Builders\VerseBuilder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class BaseController extends Controller
{
    public function index(Request $request)
    {
        $path = $request->get('path', null);
        if (empty($path)) {
            throw new Exception("Laraverse path not found.");
        }
        $page = VerseBuilder::findPage($path);
        if (empty($page)) {
            throw new Exception("Laraverse documentation page $page not found.");
        }
        return view('laraverse::pages.index', [
            'page' => $page
        ]);
    }
}
