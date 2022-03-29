@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')

<div class="container-fluid px-4 mt-3">
    <div class="card">

        <div class="card-header">
            <h4>
                Edit Post
                <a href="{{ url('/home') }}" class="btn btn-primary float-end">Back</a>
            </h4>
        </div>

        <div class="card-body">
            
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif
            <form action="{{ url('author/update-post/'.$post->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">-- Select Category --</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}" {{ $post->category_id == $item->id ? 'selected':''}}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Post Name</label>
                    <input type="text" name="name" value="{{ $post->name }}" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{ $post->slug }}" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea name="description" id="mySummernote" class="form-control" rows="4">{!! $post->description !!}</textarea>
                </div>
                <div class="mb-3">
                    <label for="">Youtube Iframe Link</label>
                    <input type="text" name="yt_iframe" value="{{ $post->yt_iframe }}" class="form-control" />
                </div>

                <h4>SEO Tags</h4>
                <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ $post->meta_title }}" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3">{!! $post->meta_description !!}</textarea>
                </div>
                <div class="mb-3">
                    <label for="">Meta Keyword</label>
                    <textarea name="meta_keyword" class="form-control" rows="3">{!! $post->meta_keyword !!}</textarea>
                </div>

                <div class="row">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary float-end">Update Post</button>
                        </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection