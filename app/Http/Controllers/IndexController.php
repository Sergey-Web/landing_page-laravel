<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Page;
use App\Service;
use App\Portfolio;
use DB;

class IndexController extends Controller
{
    protected $pages = NULL;
    protected $employee = NULL;
    protected $service = NULL;
    protected $portfolio = NULL;
    protected $menu;
    protected $tags; 

    public function __construct()
    {
        $this->employee = Employee::all();
        $this->pages = Page::all();
        $this->service = Service::all();
        $this->portfolio = Portfolio::all();
        $this->menu = $this->menuNav();
        $this->tags = $this->getTags();
    }

    public function index(Request $request)
    {

        if($request->isMethod('post')) {
            $this->sandMail($request);
        }

        return view('main.index', [
            'pages'     => $this->pages,
            'employees' => $this->employee,
            'services'  => $this->service,
            'portfolio' => $this->portfolio,
            'menu'      => $this->menu,
            'tags'      => $this->tags
        ]);
    }

    protected function sendMain($request)
    {
        $this->valForm()
    }

    protected function valForm()
    {
        $message = [

        ];

        $this->validate($request, [
            
        ]);
    }

    protected function menuNav()
    {
        $menu = [];

        if(count($this->pages) > 0) {
            foreach($this->pages as $page) {
                array_push($menu, [
                    'title' => $page->name,
                    'alias' => $page->alias
                ]);
            }
        }

        if(count($this->service) > 0) {
            array_push($menu, [
                'title' => 'Services',
                'alias' => 'service'
            ]);
        }

        if(count($this->portfolio) > 0) {
            array_push($menu, [
                'title' => 'Portfolio',
                'alias' => 'portfolio'
            ]);
        }

        if(count($this->employee) > 0) {
            array_push($menu, [
                'title' => 'Team',
                'alias' => 'team'
            ]);
        }

        array_push($menu, [
            'title' => 'Contact',
            'alias' => 'contact'
        ]);

        return $this->menu = $menu;

    }

    protected function getTags()
    {
        return DB::table('portfolio')->select('tags')->distinct()->get();
    }
}
