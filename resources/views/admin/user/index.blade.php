@extends('layouts.master')

@section('title', 'All Users')

@section('content')

<div class="container-fluid px-4 mt-3">
    <div class="card">
        <div class="card-header">
            <h4>
                View Users
            </h4>
        </div>

        <div class="card-body">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="table-responsive">
            <table id="myDataTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)   
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role_as == '1' ? 'Admin' : ($item->role_as == '2' ? 'Blogger' : 'User') }}</td>
                            <td>
                                <a href="{{ url('admin/user/'.$item->id) }}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <a href="{{ url('admin/delete-user/'.$item->id) }}" class="btn btn-danger">Delete</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

@endsection