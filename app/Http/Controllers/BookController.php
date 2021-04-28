<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Hacer uso del recurso y asignarle un alias
use App\Http\Resources\Book as BookResource;
//Hacer uso del modelo
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //GET - Books
        //return all books
        $books = Book::all();

        //return book collections
        return BookResource::collection($books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Metodo guardar y editar
        /*evaluar los datos que estan siendo enviados, si el metodo es put que busque dentro del modelo
        el id; si el metodo es otro que cree un nuevo libro*/
        $book = $request->isMethod('put') ? Book::findOrFail($request->id) : new Book;

        $book->id = $request->input('id');
        $book->title = $request->input('title');
        $book->genre = $request->input('genre');
        $book->author = $request->input('author');
        $book->publisher = $request->input('publisher');
        $book->year = $request->input('year');
        $book->cover = $request->input('cover');

        if($book->save()){
            return new BookResource($book);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //GET books by id
        $book = Book::findOrFail($id);

        //return data
        return new BookResource($book);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete a book by id
        $book=Book::findOrFail($id);

        if($book->delete()){
            return new BookResource($book);
        }

    }
}
