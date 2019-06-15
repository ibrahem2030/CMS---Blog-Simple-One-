<?php

namespace CMS\Http\Controllers;

use Illuminate\Http\Request;
use CMS\setting;
use CMS\Category;
use CMS\post;
use CMS\tag;

class websiteUiController extends Controller
{

    // check auth verified 
 

    // the Home Ui page
    public function index(){

    	$tags = tag::all();
    	$settings = setting::first();
    	$categories = category::all()->take(5);

    	$posts_desc = post::orderBy('created_at', 'desc');
    	$first_post = $posts_desc->first();
    	$second_post = $posts_desc->skip(1)->take(1)->get()->first();
    	$third_post = $posts_desc->skip(2)->take(1)->get()->first();
    	

    	return view('index')->with('settings', $settings)
    						->with('categories', $categories)
    						->with('first_post', $first_post)
    						->with('second_post', $second_post)
    						->with('third_post', $third_post)
    						->with('tags', $tags);
    }

    //Show specific Post
    public function showPost($slug){


    	$post = post::where('slug', $slug)->first();
    	$settings = setting::first();
    	$categories = category::all()->take(5);
    	$tags = tag::all();


    	$posts_desc = post::orderBy('created_at', 'desc');
    	$next_post = $posts_desc->first();
    	$prev_post = $posts_desc->skip(1)->take(1)->get()->first();

    	return view('post.uishow')->with('post' , $post)
    							->with('settings', $settings)
    							->with('categories', $categories)
    							->with('tags', $tags)
    							->with('prev_post', $prev_post)
    							->with('next_post', $next_post);
    }

	//Show specific Post
    public function showCategory($id){


    	$category = category::where('id', $id)->first();
    	$settings = setting::first();
    	$categories = category::all();
    	$tags = tag::all();
    	
    	$category_posts = $category->posts->sortByDesc("created_at");

    	return view('category.uishow')->with('category' , $category)
	    							->with('settings', $settings)
	    							->with('categories', $categories)
	    							->with('category_posts', $category_posts)
	    							->with('tags', $tags);
    }

    //Show specific tag posts
    public function showTag($id){


    	$categories = category::all();
    	$settings = setting::first();
    	$tag = tag::where('id', $id)->first();
    	$tags = tag::all();
    	
    	return view('tags.uishow')->with('tag' , $tag)
	    							->with('settings', $settings)
	    							->with('categories', $categories)
	    							->with('tags', $tags);
    }

    //Show specific tag posts
    public function search(Request $request){


        $categories = category::all();
        $settings = setting::first();
        $tag = tag::where('tag', 'like', '%'. $request->search . '%' )->first();
        $tags = tag::all();
        
        return view('tags.uishow')->with('tag' , $tag)
                                    ->with('settings', $settings)
                                    ->with('categories', $categories)
                                    ->with('tags', $tags);
    }
    	
}
