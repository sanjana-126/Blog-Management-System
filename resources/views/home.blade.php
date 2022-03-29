@extends('layouts.app')


@section('content')
<div class="container-fluid px-4" style="min-height: 100vh">
    @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
    <h1 class="mt-4">Dashboard</h1>
        <h4>{{ Auth::user()->name }}</h4>
        <h6>{{ Auth::user()->email }}</h6>
    <div class="row mt-5">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    Total Posts
                    <h2>{{ $totalposts }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">
                    Total Comments
                    <h2>{{ $totalcomments }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    Pending Posts
                    <h2>{{ $pendingposts }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    Rejected Posts
                    <h2>1</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="myDataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Post Name</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post as $item)  
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->status == '1' ? 'Pending' : 'Approved' }}</td>
                                <td>
                                    <a href="{{ url('author/edit-post/'.$item->id) }}" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                    <a href="{{ url('author/delete-post/'.$item->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                                <td>
                                    <a href="{{ url('post/'.$item->category->slug.'/'.$item->slug) }}" class="btn btn-primary">View</a>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
    </div>

    <div class="card">
        <a href={{ url('author/create') }} class="btn btn-primary">Create New Post</a>
    </div>
</div>
    </div>
</div>


@endsection
