<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return [
            'Listado de Peliculas'
        ];
        /* return Movie::paginate(); */
        /* return Movie::all(); */
    }

    public function store(Request $request)
    {
        $request->validate([
            'titleFormMovie'        => ['required'],
            'genreFormMovie'        => ['required'],
            'descriptionFormMovie'  => ['required'],
            'ageFormMovie'          => ['required'],
            'numberCopiesFormMovie' => ['required']
        ]);

        $movie = new Movie;
        $movie->title        = $request->input('titleFormMovie');
        $movie->genre        = $request->input('genreFormMovie');
        $movie->description  = $request->input('descriptionFormMovie');
        $movie->age          = $request->input('ageFormMovie');
        $movie->number_stock = $request->input('numberCopiesFormMovie');
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
            'titleFormMovie'        => ['required'],
            'genreFormMovie'        => ['required'],
            'descriptionFormMovie'  => ['required'],
            'ageFormMovie'          => ['required'],
            'numberCopiesFormMovie' => ['required']
        ]);

        $movie->title        = $request->input('titleFormMovie');
        $movie->genre        = $request->input('genreFormMovie');
        $movie->description  = $request->input('descriptionFormMovie');
        $movie->age          = $request->input('ageFormMovie');
        $movie->number_stock = $request->input('numberCopiesFormMovie');
        $movie->save();
        
        return $movie;
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return response()->noContent();
    }
}
