<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;


class BlogController extends Controller
{
    //
    public function create()
    {
        return view('welcome');
    }

    //blog addition
    public function blogAdd(Request $request)
    {
        $storeData = $request->validate([
            'title' => 'required|unique:blog|max:500',
            'description' => 'required|max:5000',
        ]);

        /*  Blog::insert([
            'title' => $request->title,
            'description' => $request->description,
            'create_at' => Carbon::now(),
        ]); */
        $blog =  Blog::create($storeData);
        if ($blog) {
            //alert()->flash('Welcome back!', 'success');
            return redirect('/blogdetails')->with('completed', 'blog has been saved!');
        } else {
            //Alert::error('Failed', 'Registration failed');
            return back();
        }


        //  return Redirect()->back()->with('success', 'employee data inserted succesfully');
        // return Redirect('/');

    }

    //blog edit
    public function Edit($id)
    {
        $editing = Blog::find($id);
        $blogs = DB::table('blog');
        // print_r($editing);
        return view('Blog.blogedit', compact('editing'));
    }


    //update blog
    public function update(Request $request, $id)
    {
        $update = Blog::find($id)->update([
            'title' => $request->title,
            'description'   => $request->description,
        ]);
        return redirect('/blogdetails')->with('Updated', 'blog has been updated!');
    }

    //delete blog
    public function delete($id)
    {
        $delete = Blog::find($id)->forceDelete();
        return redirect('/blogdetails')->with('deleted', 'blog has been deleted!');
    }
}