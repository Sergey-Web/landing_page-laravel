<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminMail;

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
        return view('main.index', [
            'pages'     => $this->pages,
            'employees' => $this->employee,
            'services'  => $this->service,
            'portfolio' => $this->portfolio,
            'menu'      => $this->menu,
            'tags'      => $this->tags
        ]);
    }

    public function contact(Request $request)
    {
        $data = $request->all();
        $mailAdmin = env('MAIL_ADMIN');

        Mail::to($mailAdmin)->send(new AdminMail($data));
/*        Mail::send(
            'layouts.message-admin',
            ['data' => $data],
            function($message) use ($data) {
                $mailAdmin = env('MAIL_ADMIN');
                $message->from($data['email'], $data['name']);
                $message->to($mailAdmin)->subject('Question');
            }
        );*/
        return redirect()->route('home')->with(['status' => 'Message sent']);
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
