<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return [
            'Clientes'
        ];
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstNameClientForm'            => ['required'],
            'lastNameClientForm'             => ['required'],
            'identificationNumberClientForm' => ['required']
        ]);

        $client = new Client;
        $client->first_name            = $request->input('firstNameClientForm');
        $client->last_name             = $request->input('lastNameClientForm');
        $client->identification_number = $request->input('identificationNumberClientForm');
        $client->description           = $request->input('decriptionClientForm');
        $client->save();

        return $client;
    }

    public function show(Client $client)
    {
        return $client;
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'firstNameClientForm'            => ['required'],
            'lastNameClientForm'             => ['required'],
            'identificationNumberClientForm' => ['required'],
            'decriptionClientForm'           => ['required']
        ]);

        $client = new Client;
        $client->first_name            = $request->input('firstNameClientForm');
        $client->last_name             = $request->input('lastNameClientForm');
        $client->identification_number = $request->input('identificationNumberClientForm');
        $client->description           = $request->input('decriptionClientForm');
        $client->save();

        return $client;
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return response()->noContent();
    }
}
