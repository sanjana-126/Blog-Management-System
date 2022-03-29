@extends('layouts.app')

@section('title', "$post->meta_title")

@section('meta_description', "$post->meta_description")

@section('meta_keyword', "$post->meta_keyword")

@section('content')

<div class="py-4">
    <div class="container">
        <div class="row">
                <div class="category-heading">
                    <h4 class="mb-0">{!! $post->name !!}</h4>
                </div>
                <div class="mt-4 ms-2">
                    <h6>
                        {{ $post->category->name .' / '. $post->name }}
                    </h6>
                </div>

                <div class="card card-shadow mt-4">
                    <div class="card-body post-description">
                        {!! $post->description !!}
                    </div>
                </div>
        </div>
        @if (Auth::user()->role_as == '1')
            <div class="row">
                <button type="button" class="btn btn-success mt-3 float-end">Approve</button>
                <button type="button" class="btn btn-danger mt-3 float-end">Reject</button>
            </div>
        @endif
        
    </div>
</div>

@endsection

