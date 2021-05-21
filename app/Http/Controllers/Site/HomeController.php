<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('site.home.index');
    }

    public function careers()
    {
        $data['careers'] = Career::all();

        return response()
            ->view('site.careers.index', $data, 200);
    }

    public function careersDetail(Career $career)
    {
        $data['detail'] = $career;

        return response()
            ->view('site.careers.detail', $data, 200);
    }

    public function portfolio()
    {
        return response()
            ->view('site.portfolio.index');
    }

    public function contact()
    {
        return response()
            ->view('site.contact.index');
    }
}
