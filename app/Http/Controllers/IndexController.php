<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Page;
use App\Service;
use App\Portfolio;

class IndexController extends Controller
{
    public function index(Request $request) {
        return view('main.index');
    }
}
