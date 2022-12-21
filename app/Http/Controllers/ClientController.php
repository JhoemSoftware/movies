<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        /* return [
            'Clientes'
        ]; */
        return Client::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name'            => ['required'],
            'last_name'             => ['required'],
            'identification_number' => ['required']
        ]);

        $client = new Client;
        $client->first_name            = $request->input('first_name');
        $client->last_name             = $request->input('last_name');
        $client->identification_number = $request->input('identification_number');
        $client->description           = $request->input('description');
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
            'first_name'            => ['required'],
            'last_name'             => ['required'],
            'identification_number' => ['required'],
        ]);

        $client = new Client;
        $client->first_name            = $request->input('first_name');
        $client->last_name             = $request->input('last_name');
        $client->identification_number = $request->input('identification_number');
        $client->description           = $request->input('description');
        $client->save();

        return $client;
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return response()->noContent();
    }
}
