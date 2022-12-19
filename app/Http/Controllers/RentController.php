<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function index()
    {
        return [
            'Renta de películas'
        ];
        /* return Rent::paginate(); */
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_clientForm'   => ['required'],
            'id_movieForm'    => ['required'],
            'first_dateForm'  => ['required'],
            'second_dateForm' => ['required']
        ]);

        $rent = new Rent;
        $rent->client_id   = $request->input('id_clientForm');
        $rent->movie_id    = $request->input('id_movieForm');
        $rent->first_date  = $request->input('first_dateForm');
        $rent->second_date = $request->input('second_dateForm');
        $rent->description = $request->input('descriptionForm');
        $rent->save();

        return $rent;
    }

    public function show(Rent $rent)
    {
        return $rent;
    }

    public function update(Request $request, Rent $rent)
    {
        $request->validate([
            'id_clientForm'   => ['required'],
            'id_movieForm'    => ['required'],
            'first_dateForm'  => ['required'],
            'second_dateForm' => ['required']
        ]);

        $rent->client_id   = $request->input('id_clientForm');
        $rent->movie_id    = $request->input('id_movieForm');
        $rent->first_date  = $request->input('first_dateForm');
        $rent->second_date = $request->input('second_dateForm');
        $rent->description = $request->input('descriptionForm');
        $rent->save();

        return $rent;
    }

    public function destroy(Rent $rent)
    {
        $rent->delete();
        return response()->noContent();
    }
}
