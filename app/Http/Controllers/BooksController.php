<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::join('authors', 'books.author', '=', 'authors.id')->
            select(['books.*','authors.name','authors.surname'])->
            orderBy('publication_date', 'DESC')->
            paginate(10);
        return view('books.index', compact('books'));
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
        //
    }

    /**
     * Show the form for searching resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        return view('books.search');
    }
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $content = $request->input('content');
        $title = $request->input('title');
        switch($title)
        {
            case 'T':
                $books = Book::join('authors', 'books.author', '=', 'authors.id')->
                    select(['books.*','authors.name','authors.surname'])->
                    where('title', 'like', '%'.$content.'%')->
                    orderBy('publication_date', 'DESC')->
                    get();
                break;
            case 'A':
                $books = Book::join('authors', 'books.author', '=', 'authors.id')->
                    select(['books.*','authors.name','authors.surname'])->
                    where('authors.name', 'like', '%'.$content.'%')->
                    orWhere('authors.surname', 'like', '%'.$content.'%')->
                    orderBy('publication_date', 'DESC')->
                    get();
                break;
                case 'D':
                $books = Book::join('authors', 'books.author', '=', 'authors.id')->
                    select(['books.*','authors.name','authors.surname'])->
                    where('publication_date', 'like', '%'.$content.'%')->
                    orderBy('publication_date', 'DESC')->
                    get();
                break;
            default:
                $books = Book::join('authors', 'books.author', '=', 'authors.id')->
                    select(['books.*','authors.name','authors.surname'])->
                    orderBy('publication_date', 'DESC')->
                    get();
        }

        return view('books.found', compact('books'));
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
        //
    }
}
