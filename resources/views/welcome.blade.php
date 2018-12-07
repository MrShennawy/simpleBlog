@extends('layouts.app')

@section('content')
        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4">View Blogs </h1>
            @if(Session::has('flash_error'))
            <div class="alert alert-danger">{{Session::get('flash_error')}}</div>
            @endif
            @foreach($blogs as $blog)
            <!-- Blog Post -->
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title">{{$blog->title}}</h2>
                    <p class="card-text">{{str_limit($blog->content,180)}}</p>
                    <a href="{{url('blogs/'.$blog->id)}}" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on {{$blog->created_at->toFormattedDateString()}} by
                    <a href="{{url('users/'.$blog->User->id)}}">{{$blog->User->name}}</a>
                    Category : <a href="{{url('categories/'.$blog->category_id)}}">{{$blog->Cat->name}}</a>
                </div>
            </div>
            @endforeach
            {{ $blogs->links() }}
        </div>
@endsection
