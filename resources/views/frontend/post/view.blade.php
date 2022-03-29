@extends('layouts.app')

@section('title', "$post->meta_title")

@section('meta_description', "$post->meta_description")

@section('meta_keyword', "$post->meta_keyword")

@section('content')

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
            <form action="{{ url('/delete-comment') }}" method="POST">
                @csrf

                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Category with its Posts</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="comment_delete_id" id="comment_id">
                <h5>Category will be deleted permanently. Do you want to Delete?</h5>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
      </div>
    </div>
  </div>

<div class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

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

                    <d class="comment-area mt-4">

                        @if (session('message'))
                            <h6 class="alert alert-warning">{{ session('message') }}</h6>
                        @endif

                        <div class="card card-body">
                            <h6 class="card-title">Leave a comment</h6>
                            <form action="{{ url('comments') }}" method="POST">
                                @csrf
                                <input type="hidden" name="post_slug" value="{{ $post->slug }}">
                                <textarea name="comment_body" class="form-control" rows="3" required></textarea>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>

                        @forelse ($post->comments as $item)
                        <div class="comment-container card card-body shadow-sm mt-3">
                            <div class="detail-area">
                                <h6 class="user-name mb-1">
                                    @if ($item->user)
                                        <strong style="font-size: 20px">
                                            {{ $item->user->name }}
                                        </strong>
                                        <small class="ms-3 text-primary">Commented on: {{ $item->created_at->format('d-m-Y') }}</small>
                                    @endif
                                    
                                </h6>
                                <p class="user-comment mb-2">
                                    {!! $item->comment_body !!}
                                </p>
                            </div>
                            @if (Auth::check() && Auth::id() == $item->user_id)
                            <div>
                                <button type="button" value="{{ $item->id }}" class="deleteComment btn btn-danger btn-sm me-2 float-end">Delete</button>
                            </div>
                            @endif
                        </div>
                        @empty
                        <div class="card card-body shadow-sm mt-3">
                            <h6>No Comments Yet.</h6>
                        </div>
                        @endforelse
                    </div>
                    <div class="col-md-4">
                        <div class="border p-2">
                            <h4>Advertising Area</h4>
                        </div>
                        <div class="border p-2">
                            <h4>Advertising Area</h4>
                        </div>
                        <div class="border p-2">
                            <h4>Advertising Area</h4>
                        </div>
    
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4>Latest Posts</h4>
                            </div>
                            <div class="card-body">
                                @foreach ($latest_posts as $item)    
                                    <a href="{{ url('tutorial/'.$item->category->slug.'/'.$item->slug) }}" class="text-decoration-none">
                                        <h6> > {{ $item->name }}</h6>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
    
                
            </div>
</div>

@endsection


@section('scripts')
<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $(document).on('click','.deleteComment', function(){
            if(confirm('Do you want to delete this Comment?'))
            {
                var thisClicked = $(this);
                var comment_id = thisClicked.val();

                $.ajax({
                    type: 'POST',
                    url: "/delete-comment",
                    data: {
                        'comment_id': comment_id
                    },
                    success: function(res){
                        if(res.status == 200){
                            thisClicked.closest('.comment-container').remove();
                            alert(res.message);
                        }
                        else
                        {
                            alert(res.message);
                        }
                    }
                })
            }
        })
    })

</script>
@endsection