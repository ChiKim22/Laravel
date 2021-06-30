<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{

    // PostsController
    // create => view('posts.create');
    // store
    // edit => view('posts.edit');
    // update
    // destroy
    // show => view('posts.show');
    // index => view('posts.index');
    
    public function create() {
        return view('posts.create');
    }
}
