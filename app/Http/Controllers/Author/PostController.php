<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        $category = Category::where('status','0')->get();
        return view('author/create', compact('category'));
    }

    public function store(PostFormRequest $request)
    {
        $data = $request->validated();

        $post = new Post;

        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug = Str::slug($data['slug']);
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];
        $post->status = '1';
        $post->created_by = Auth::user()->id;

        $post->save();

        return redirect('/home')->with('message', 'Post Added Successfully');
    }

    public function viewposts(string $category_slug, string $post_slug)
    {
        $category = Category::where('slug', $category_slug)->where('status','0')->first();
        if($category)
        {
            $post = Post::where('category_id', $category->id)->where('slug', $post_slug)->first();
            return view('author.view', compact('post'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function edit($post_id)
    {
        $category = Category::where('status','0')->get();
        $post = Post::find($post_id);
        return view('author.edit', compact('post', 'category'));
    }

    public function update(PostFormRequest $request, $post_id)
    {
        $data = $request->validated();

        $post = Post::find($post_id);

        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug = Str::slug($data['slug']);
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];
        $post->status = '1';
        $post->created_by = Auth::user()->id;

        $post->update();

        return redirect('/home')->with('message', 'Post Updated Successfully');
    }

    public function destroy($post_id)
    {
        $post = Post::find($post_id);
        $post->delete();

        return redirect('/home')->with('message', 'Post Deleted Successfully');
    }

}
