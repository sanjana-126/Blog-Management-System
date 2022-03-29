@extends('layouts.app')

@section('title', "$category->meta_title")

@section('meta_description', "$category->meta_description")

@section('meta_keyword', "$category->meta_keyword")

@section('content')

<div class="d-flex flex-column min-vh-100">
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <div class="category-heading">
                    <h4>{{ $category->name }}</h4>
                </div>

                @forelse ($post as $postitem)
                    <div class="card card-shadow mt-4">
                        <div class="card-body">
                            <a href="{{ url('tutorial/'.$category->slug.'/'.$postitem->slug) }}" class="text-decoration-none">
                                <h3 class="post-heading">{{ $postitem->name }}</h3>
                            </a>
                            <h6>
                                Posted On: {{ $postitem->created_at->format('d-m-Y') }}
                                &nbsp;

                                <span style="font-size: 14px;">Posted By: {{ $postitem->user->name }}</span>
                            </h6>
                            
                        </div>
                    </div>
                @empty
                <div class="card card-shadow mt-4">
                    <div class="card-body">
                        <h2 class="post-heading">No Posts Available</h2>
                    </div>
                </div>
                @endforelse
                <div class="your-paginate mt-4 float-end">
                    {{ $post->links() }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="border p-2">
                    <h4>Advertising Area</h4>
                </div>
            </div>
            
        </div>
    </div>
</div>
    
@endsection