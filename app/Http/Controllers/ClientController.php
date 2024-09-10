<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Civilite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\ClientUpdateRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('client.index', compact('clients'));
    }

    public function indexTrashed()
    {
        $clients = Client::onlyTrashed()->get();
        return view('client.trashed', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $civilites = Civilite::all();
        return view('client.create', compact('civilites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientStoreRequest $request)
    { 
        Client::create($request->validated());
        return redirect()->route('welcome')->with('success', 'Vous vous êtes inscrit avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        $civilites = Civilite::all();
        return view('client.edit', compact('client', 'civilites'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientUpdateRequest $request, Client $client)
    {
        $client->update($request->validated());
        return redirect()->route('client.index')->with('success', 'Client modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('client.trashed')->with('success', 'Client supprimé avec succès');
    }

    public function restore(string $id)
    {
        $client = Client::onlyTrashed()->findOrFail($id);
        $client->restore();
        return redirect()->route('client.index')->with('success', 'Client restauré avec succès'); 
    }
}
