<?php

namespace App\Http\Controllers;

use App\Http\Requests\BooksRequest;
use App\Models\Books;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class BookController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Books::all();
        return $this->success($books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BooksRequest $req)
    {
        $book = Books::create($req->all());
        return $this->created($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Books::findOrFail($id);
        return $this->success($book);
    }

    public function update($id, BooksRequest $req)
    {
        $book = Books::findOrFail($id);
        $book->update($req->all());
        return $this->updated($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Books::findOrFail($id);
        $book->delete();
        return $this->destroyed();
    }
}
