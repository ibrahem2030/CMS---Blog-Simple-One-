<?php

namespace CMS\Http\Controllers;

use Illuminate\Http\Request;
use CMS\post;
use CMS\tag;
use CMS\category;
use CMS\user;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        $this->middleware(['auth' , 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all()->count();

        $categories = Category::all()->count();

      
        $tags = tag::all()->count();


        $users = user::all()->count();

     
        $trashedPosts = post::onlyTrashed()->get()->count(); 
     
        return view('dashboard')->with('posts',$posts )
                                ->with('categories', $categories)
                                ->with('tags', $tags)
                                ->with('users', $users)
                                ->with('trashedPosts', $trashedPosts);
    }
}
