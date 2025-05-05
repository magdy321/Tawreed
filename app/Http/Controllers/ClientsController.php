<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Clients::all();
        return view('dashboard.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|string|max:50',
            'type' => 'required|in:trader,customer',
            'phone' => 'required|regex:/^[0-9+\-\s]{6,20}$/',
            'address' => 'nullable|string',

            
        ]);

        // Client::create([
        //     'name' => $request->name,
        //     'type' => $request->type,
        //     'phone' => $request->phone,
        //     'address' => $request->address,
        // ]);
        Clients::create($validation);
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Clients $clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Clients::findorFail($id);
        return view('dashboard.clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name' => 'required|string|max:50',
            'type' => 'required|in:trader,customer',
            'phone' => 'required|regex:/^[0-9+\-\s]{6,20}$/',
            'address' => 'nullable|string',

            
        ]);

        $client = Clients::findorFail($id);
        $client->update($validation);
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Clients::findorFail($id)->delete();
        return redirect()->route('clients.index');
    }
}
