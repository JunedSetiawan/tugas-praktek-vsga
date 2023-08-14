<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $this->spladeTitle('Blog Splade');

        return view('pages.home.home',[
            'posts' => Post::query()->latest()->paginate(6),
        ]);
    }
}
