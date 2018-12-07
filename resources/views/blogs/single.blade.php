@extends('layouts.app')

@section('content')
        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Title -->
          <h1 class="mt-4">{{$blog->title}}</h1>

          <!-- Author -->
          <p class="lead">
            by
            <a href="{{url('users/'.$blog->User->id)}}">{{$blog->User->name}}</a>
            Posted on {{$blog->created_at->toDayDateTimeString()}}
          </p>

          <hr>

          <!-- Post Content -->
          <p class="lead">
            {{$blog->content}}
          </p>

          <hr>
          @foreach($blog->Comments as $cmnt)
          <!-- Single Comment -->
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="https://c5.rgstatic.net/m/4671872220764/images/template/default/profile/profile_default_m.jpg" alt="">
            <div class="media-body">
              <h5 class="mt-0">{{$cmnt->User->name}}</h5>
              {{$cmnt->content}}
            </div>
          </div>
          @endforeach
          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
                @if(Session::has('flash_message'))
                <div class="alert alert-success">{{Session::get('flash_message')}}</div>
                @endif
              <form action="{{url('cmnts')}}" method="post">
                @csrf
                <div class="form-group">
                  <textarea name="content" class="form-control" rows="3">{{old('content')}}</textarea>
                  <input type="hidden" name="blog" value="{{$blog->id}}">
                  @if($errors->has('content'))
                  <span class="help-block">
                  <strong>{{$errors->first('content')}}</strong>
                  @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>

        </div>
@endsection
