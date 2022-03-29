@extends('layouts.app')

@section('title', "Blogging Website")

@section('meta_description', "Blogging Website")

@section('meta_keyword', "Blogging Website")

@section('content')

<div class="bg-background py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel category-carousel owl-theme">
                    @foreach ($all_categories as $item)
                        
                    <div class="item">
                        <a href="{{ url('tutorial/'.$item->slug) }}" class="nav-link">
                            <div class="card">
                                <img src="{{ asset('uploads/category/'.$item->image) }}" alt="Image" height="200px">
                                <div class="card-body text-center">
                                    <h5 class="text-dark">{{ $item->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<div class="py-1 bg-gray">
    <div class="container">
        <div class="border text-center p-3">
            <h3>Advertise here</h3>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Blog Adda: Find everything about CSE</h4>
                <div class="underline"></div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque aut nostrum adipisci nobis vero, magni maxime repellendus ipsum repudiandae error tenetur. Laudantium, inventore nemo! Excepturi nobis est quibusdam molestias ratione?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto natus, vel iste, consequuntur, doloribus maiores dolorum repudiandae optio sint facilis obcaecati veritatis officia saepe quaerat neque tempora iure labore. Doloribus.
                    </p>
            </div>
        </div>
    </div>
</div>


<div class="py-5 bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>All Categories List</h4>
                <div class="underline"></div>
            </div>
            @foreach ($all_categories as $item)
                <div class="col-md-3">
                    <div class="card card-body mb-3">
                        <a href="{{ url('tutorial/'.$item->slug) }}" class="text-decoration-none">
                            <h5 class="text-dark mb-0">
                                {{ $item->name }}
                            </h5>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
    

<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Recent Posts</h4>
                <div class="underline"></div>
            </div>
            <div class="col-md-8">
                @foreach ($latest_posts as $item)
                    <div class="card card-body shadow mb-3">
                        {{-- <span style="font-size: 15px" class="text-align-end">Posted On: </span> --}}
                        <a href="{{ url('tutorial/'.$item->category->slug.'/'.$item->slug) }}" class="text-decoration-none">
                            <h5 class="text-dark mb-0">
                                {{ $item->name }}
                            </h5>
                        </a>
                        <small class="ms-1 mt-2 text-primary">Posted on: {{ $item->created_at->format('d/m/Y') }}</small>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4">
                <div class="border text-center p-3">
                    <h3>Advertise here</h3>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection