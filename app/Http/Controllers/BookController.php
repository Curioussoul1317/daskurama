<?php

namespace App\Http\Controllers;

use App\book;
use Illuminate\Http\Request;
use App\category;
use File;
use App\pages;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = category::all();
        $books = book::Where('category_id', 1)->get();
        return view('category')->with('categories', $categories)->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, $name)
    {
        return view('addbooks')->with('id', $id)->with('name', $name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = category::all();
        $books = book::Where('category_id', $id)->get();
        return view('category')->with('categories', $categories)->with('books', $books);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $name)
    {
        $categories = category::all();
        $book = book::Find($id);
        $pages = pages::Where('books_id', $id)->get();
        return view('editbooks')->with('categories', $categories)->with('book', $book)->with('name', $name)->with('id', $id)->with('pages', $pages);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, book $book)
    {
        $this->validate($request, [
            'id' => 'required',
            'category' => 'required',
            'book_name' => 'required',

        ]);
  
  
        if ($request->hasFile('Cover_img')) {
            $imagedelete = $request->input('img_name');
            File::delete('public/bookcover', $imagedelete);
            $filenamewithExt = $request->file('Cover_img')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('Cover_img')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('Cover_img')->storeAs('public/bookcover', $fileNameToStore);
        } else {
            $fileNameToStore = $request->input('img_name');
        }


        $book = book::find($request->id);
        $book->category_id = $request->input('category');
        $book->bookname = $request->input('book_name');
        $book->cover_image = ($fileNameToStore);
        $book->save();
        $successinfo = ($request->input('book_name') . ' Infomation Updated ');
        return redirect()->back()->with('success', $successinfo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(book $book)
    {
        //
    }
}
