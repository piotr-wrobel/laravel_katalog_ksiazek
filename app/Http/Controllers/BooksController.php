<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Http\Requests\BookRequest;
use App\Http\Requests\BookSearchRequest;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Response;


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
     * @return Response
     */
    public function index()
    {
        $books = Book::join('authors', 'books.author', '=', 'authors.id')->
            select(['books.*','authors.name','authors.surname'])->
            orderBy('publication_date', 'DESC')->
            paginate(5);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws GuzzleException
     */
    public function create()
    {

        $authors = Author::select(['id','name','surname'])->
        orderBy('surname')->
        get();

        $client = new Client;
        $data =$client->request('GET', 'https://restcountries.eu/rest/v2/all', [
            'headers' => [
                'Accept'     => 'application/json',
                'Content-type' => 'application/json'
            ]
        ]);
        $countries = json_decode($data->getBody()->getContents());
       return view('books.create',compact(['authors','countries']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BookRequest $request
     * @return Response
     */
    public function store(BookRequest $request)
    {
        Book::create($request->all());
        return redirect()->route('books.index');
    }

    /**
     * Show the form for searching resources.
     *
     * @return Response
     */
    public function search()
    {
        return view('books.search');
    }
    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function show(BookSearchRequest $request)
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
                case 'J':
                $books = Book::join('authors', 'books.author', '=', 'authors.id')->
                    select(['books.*','authors.name','authors.surname'])->
                    where('translation', 'like', '%'.$content.'%')->
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
     * @param Book $book
     * @return Response
     * @throws GuzzleException
     */
    public function edit(Book $book)
    {
        $authors = Author::select(['id','name','surname'])->
        orderBy('surname')->
        get();

        $client = new Client;
        $data =$client->request('GET', 'https://restcountries.eu/rest/v2/all', [
            'headers' => [
                'Accept'     => 'application/json',
                'Content-type' => 'application/json'
            ]
        ]);
        $countries = json_decode($data->getBody()->getContents());

        return view('books.edit',compact(['book','countries','authors']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BookRequest $request
     * @param Book $book
     * @return Response
     */
    public function update(BookRequest $request, Book $book)
    {
        $book->update($request->all());
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Book $book
     * @return Response
     */
    public function destroy(Book $book)
    {
        try {
            $book->delete();
        }catch(Exception $e) {
            return redirect()->route('books.index')->with('warning', 'Nie można usunąć pozycji '.$book->title);
        }
        return redirect()->route('books.index')->with('success', 'Pozycja usunięta poprawnie');
    }
}
