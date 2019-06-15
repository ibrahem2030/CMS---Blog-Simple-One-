<?php

namespace CMS\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use CMS\Category;
use CMS\post;
use CMS\Tag;
class postController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::all();
        return view('post.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            "title" => "required",
            "content" => "required",
            "category_id" => "required",
            "file" => "required|image",
            "tags" => "required"
        ]); 
         // path + name
         $filePath = $request->file;
         // time stamp + file name + ext
         $fileNameOrig = time().$filePath->getClientOriginalName();
         $filePath->move('uploads/posts', $fileNameOrig);


         $post = new post;
         $post->title = $request->title;
         $post->content = $request->content; 
         $post->category_id = $request->category_id;
         $post->file = 'uploads/posts/'. $fileNameOrig;
         $post->slug = str_slug($request->title); // post-name
         /*
         $tags_id = [];
               if ($request->tags) {
                   $tags = explode(',', $request->tags);
                   foreach ($tags as $tag) {
                       $tag_ref = Tag::firstOrCreate(['name' => $tag]);
                       $tags_id[] = $tag_ref->id;
                   }
               }*/
        $post->save(); 
         $post->tags()->attach($request->tags);
              

       return redirect()->back()->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $post = post::find($id);
         $categories = category::all();
         $tags = tag::all();
         $selectedTags = $post->tags;
         return view('post.edit')->with('selectedTags', $selectedTags)->with('post', $post)->with('tags', $tags)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "title" => "required",
            "content" => "required",
            "category_id" => "required",
            "file" => "required|image"
        ]);

        $post = post::find($id);

        if($request->hasFile('file')) {
            // path + name
             $filePath = $request->file;
             // time stamp + file name + ext
             $fileNameOrig = time().$filePath->getClientOriginalName();
             $filePath->move('uploads/posts', $fileNameOrig);

             $post->file = 'uploads/posts/'. $fileNameOrig;
        }

    
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

         $post->tags()->sync($request->tags);

        $post->save();

        

        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $post = Post::find($id);
       $post->delete();

       return redirect(route('posts'));
    }

    public function trashed()
    {
       $posts = Post::onlyTrashed()->get();
       return view('post.softdeleted')->with('posts', $posts);
    }

    public function hardDelete($id)
    {
       $post = Post::onlyTrashed()->where('id', $id)->first();
       $post->forceDelete();

       return redirect()->back();
    }

    public function restore($id)
    {
       $post = Post::onlyTrashed()->where('id', $id)->first();
       $post->restore();

       return redirect()->route('posts');
    }
}
