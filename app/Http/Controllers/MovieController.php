<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        /* return [
            'Listado de Peliculas'
        ]; */
        return Movie::all();
        /* $portafolio = Movie::get();
        return view('pages.movies.index', ['portafolio' => $portafolio]); */
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'        => ['required'],
            'genre'        => ['required'],
            'description'  => ['required'],
            'age'          => ['required'],
            'number_stock' => ['required']
        ]);

        $movie = new Movie;
        $movie->title        = $request->input('title');
        $movie->genre        = $request->input('genre');
        $movie->description  = $request->input('description');
        $movie->age          = $request->input('age');
        $movie->number_stock = $request->input('number_stock');
        $movie->save();
        
        return $movie;
    }

    public function show(Movie $movie)
    {
        return $movie;
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title'        => ['required'],
            'genre'        => ['required'],
            'description'  => ['required'],
            'age'          => ['required'],
            'number_stock' => ['required']
        ]);

        $movie->title        = $request->input('title');
        $movie->genre        = $request->input('genre');
        $movie->description  = $request->input('description');
        $movie->age          = $request->input('age');
        $movie->number_stock = $request->input('number_stock');
        $movie->save();
        
        return $movie;
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return response()->noContent();
    }
}
