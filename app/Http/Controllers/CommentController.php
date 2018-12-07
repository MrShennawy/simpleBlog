<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
        ],[
            'content.required' => 'Comment Content is required',
        ]);
        $newBlog = Blog::create([
                'user_id' => \Auth::id(),
                'blog_id' => request('blog'),
                'content' => request('content')
            ]);
        return back()->withFlashMessage('Comment added successfully');
    }
}
