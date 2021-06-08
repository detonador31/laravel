<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('site.category.index', [
        //     'categories' => Category::all(),
        // ]);
        return view('site.category.index');        
    }

    // public function show(Category $category)
    // {
    //     return view('site.category.show', ['category' => $category->load('products')]);
    // }

    public function show($slug)
    {
        return view('site.category.show', ['slug' => $slug]);
    }    

}
