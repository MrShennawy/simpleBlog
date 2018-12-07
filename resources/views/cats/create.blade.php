@extends('layouts.app')

@section('content')
    <div class="col-lg-8">
        <!-- Comments Form -->
        <div class="card my-4">
            <h5 class="card-header">Create New Category :</h5>
            <div class="card-body">
                @if(Session::has('flash_message'))
                <div class="alert alert-success">{{Session::get('flash_message')}}</div>
                @endif
                <form action="{{url('categories')}}" method="post">
                @csrf
                    <div class="form-group">
                        <input type="test" class="form-control" placeholder="Category name" name="name" value="{{old('name')}}" autofocus>
                        @if($errors->has('name'))
                        <span class="help-block">
                        <strong>{{$errors->first('name')}}</strong>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
