@extends('layouts.app')

@section('content')
    <div class="col-lg-8">
        <!-- Comments Form -->
        <div class="card my-4">
            <h5 class="card-header">Add New Article :</h5>
            <div class="card-body">
                @if(Session::has('flash_message'))
                <div class="alert alert-success">{{Session::get('flash_message')}}</div>
                @endif
                <form action="{{url('blogs')}}" method="post">
                @csrf
                    <div class="form-group">
                        <input type="test" class="form-control" placeholder="Article Title" name="title" value="{{old('title')}}" autofocus>
                        @if($errors->has('title'))
                        <span class="help-block">
                        <strong>{{$errors->first('title')}}</strong>
                        @endif
                    </div>

                    <div class="form-group">
                        <select name="category_id" class="form-control">
                            <option value="" disabled selected> Select Article category</option>
                            @foreach(\App\Category::all() as $cat)
                                <option value="{{$cat->id}}" {{old('category_id') == $cat->id ? 'selected' : ''}}>{{$cat->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('category_id'))
                        <span class="help-block">
                        <strong>{{$errors->first('category_id')}}</strong>
                        @endif
                    </div>

                    <div class="form-group">
                        <textarea name="content" class="form-control" placeholder="Write Article Content" rows="3">{{old('content')}}</textarea>
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
