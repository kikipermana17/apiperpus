<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class WebbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::all();
        // return view('book.index', compact('book'));
        return view('book.index', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi data
        // $validated = $request->validate([
        //     'title' => 'required',
        //     'terbit' => 'required',
        // ]);
        $book = new Book();
        $book->title = $request->title;
        $book->terbit = $request->terbit;
        $book->save();
        // Book::create($request->all());
        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $book = Book::findOrFail($id);
        // $book->title = $request->nama;
        // $book->terbit = $request->terbit;
        // $book->save();
        // // Alert::success('Data successfully saved', 'Good Job')->autoclose(1500);
        // return redirect()->route('book.index');
        $book = Book::findOrFail($id);

        $book->update([
            'title' => $request->title,
            'terbit' => $request->terbit,
        ]);
        $book->save();
        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('book.index');
    }
}
