<?php
namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    function __construct(){
        $this->middleware(['isAdmin','auth'], ['only' => ['create','store']]);
    }

    public function index ()
    {
        $blogs = Blog::simplePaginate(5);
        return view('welcome',compact('blogs'));
    }

    public function show ($id)
    {
    	$blog = Blog::findOrFail($id);
    	return view('blogs.single',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ],[
            'title.required' => 'Article Title is required',
            'category_id.required' => 'Article Category is required',
            'content.required' => 'Article Content is required',
        ]);
        $newBlog = Blog::create([
                'user_id' => \Auth::id(),
                'title' => request('title'),
                'cat_id' => request('category_id'),
                'content' => request('content')
            ]);
        return back()->withFlashMessage('Article added successfully');
    }
}
