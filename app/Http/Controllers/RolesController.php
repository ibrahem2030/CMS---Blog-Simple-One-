<?php

namespace CMS\Http\Controllers;

use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function create($id = '')
    {   if(!empty($id)){
            $parent_cat = category::find($id);
        }else {
            $parent_cat = null;
        }
        $categories = category::all();
        $tags = tag::all();
        return view('post.create')->with('categories', $categories)->with('tags', $tags)->with('parent_cat', $parent_cat);
    }

}
