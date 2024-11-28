<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogPostController extends Controller
{
    public function index(){
        $name = "codingsluv";
        return Inertia::render('Blog/index', [
            'name' => $name,
        ]);
    }
    public function create(){
        return Inertia::render('Blog/Create');
    }
}
