<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    function __construct(){
        $this->middleware(['isAdmin','auth'], ['only' => ['create','store']]);
    }

    public function create ()
    {
    	return view('cats.create');
    }

    
   	public function store ()
   	{
        $this->validate(request(), [
            'name' => 'required',
        ],[
            'name.required' => 'Category name is required',
        ]);
        $newBlog = Category::create([
                'name' => request('name')
            ]);
        return back()->withFlashMessage('Category Created successfully');
    }
    /**
     * Show Category Articles.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = Category::findOrFail($id);
        $blogs = $cat->blogs()->simplePaginate(5);
        return view('welcome',compact('blogs'));
    }

}
