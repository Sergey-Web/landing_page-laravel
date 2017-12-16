<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($alias)
    {
        $page = Page::where('alias', '=' , $alias)->first();
        return view('single.index', ['page'=>$page]);
    }
}
