<?php

namespace App\Http\Controllers;

use App\Author;
use App\Http\Requests\AuthorRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorsController extends Controller
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
        $authors = Author::orderBy('id', 'DESC')->
        paginate(5);
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $countries = Author::select(['country'])->
        groupBy('country')->
        orderBy('country')->
        get();
        return view('authors.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AuthorRequest $request
     * @return Response
     */
    public function store(AuthorRequest $request)
    {
        Author::create($request->all());
        return redirect()->route('authors.index');
    }

    /**
     * Show the form for searching resources.
     *
     * @return Response
     */
    public function search()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return void
     */
    public function show(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Author $author
     * @return void
     */
    public function edit(Author $author)
    {
        $countries = Author::select(['country'])->
        groupBy('country')->
        orderBy('country')->
        get();
        return view('authors.edit',compact(['author','countries']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AuthorRequest $request
     * @param Author $author
     * @return void
     */
    public function update(AuthorRequest $request, Author $author)
    {
        $author->update($request->all());
        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Author $author
     * @return Response
     * @throws Exception
     */
    public function destroy(Author $author)
    {
        try {
            $author->delete();
        }catch(Exception $e) {
            return redirect()->route('authors.index')->with('warning', 'Nie można usunąć autora '.$author->name.' '.$author->surname.', istnieje powiązana z nim pozycja');
        }
        return redirect()->route('authors.index')->with('success', 'Autor usunięty poprawnie');
    }
}
