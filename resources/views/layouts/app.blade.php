<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home</title>

    <!-- Bootstrap core CSS -->
    <link href="{{Request::root()}}/site/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{Request::root()}}/site/css/blog-home.css" rel="stylesheet">
    @yield('header')
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">Blogs</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">Home</a>
                </li>
                @if(\Auth::check() ? \Auth::user()->isAdmin ? true : false : false)
                <li class="nav-item">
                    <a class="nav-link" href="{{url('categories/create')}}">New Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('blogs/create')}}">New Artical</a>
                </li>
                @endif
                <li class="nav-item">
                    @if(\Auth::check())
                    <a class="nav-link" href="{{url('logout')}}">Logout</a>
                    @else
                    <a class="nav-link" href="{{url('login')}}">Login</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        @yield('content')
        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <?php $fSection = 1; ?>
                                @foreach(\App\Category::get() as $cat)
                                @if($fSection % 2 != 0)
                                <li>
                                    <a href="{{url('categories/'.$cat->id)}}">{{$cat->name}}</a>
                                </li>
                                @endif
                                <?php $fSection++; ?>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <?php $sSection = 1; ?>
                                @foreach(\App\Category::get() as $cat)
                                @if($sSection % 2 == 0)
                                <li>
                                     <a href="{{url('categories/'.$cat->id)}}">{{$cat->name}}</a>
                                </li>
                                @endif
                                <?php $sSection++; ?>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Bootstrap core JavaScript -->
<script src="{{Request::root()}}/site/vendor/jquery/jquery.min.js"></script>
<script src="{{Request::root()}}/site/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
@yield('footer')
</body>

</html>
