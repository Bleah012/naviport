<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Client;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Cargo::with('client');

        if ($search) {
            $query->where('description', 'like', "%{$search}%")
                  ->orWhere('cargo_type', 'like', "%{$search}%");
        }

        $cargos = $query->paginate(10)->withQueryString();

        return view('cargos.index', compact('cargos', 'search'));
    }

    public function create()
    {
        $clients = Client::where('is_active', true)->get();
        return view('cargos.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'weight' => 'required|numeric|min:0.1',
            'client_id' => 'required|exists:clients,id',
            'volume' => 'nullable|numeric',
            'cargo_type' => 'nullable|string',
        ]);

        Cargo::create($request->all());

        return redirect()->route('cargos.index')->with('success', 'Cargo registered successfully.');
    }

    public function edit($id)
    {
        $cargo = Cargo::findOrFail($id);
        $clients = Client::where('is_active', true)->get();
        return view('cargos.edit', compact('cargo', 'clients'));
    }

    public function update(Request $request, $id)
    {
        $cargo = Cargo::findOrFail($id);

        $request->validate([
            'description' => 'required|string|max:255',
            'weight' => 'required|numeric|min:0.1',
            'client_id' => 'required|exists:clients,id',
            'volume' => 'nullable|numeric',
            'cargo_type' => 'nullable|string',
        ]);

        $cargo->update($request->all());

        return redirect()->route('cargos.index')->with('success', 'Cargo updated successfully.');
    }

    public function destroy($id)
    {
        $cargo = Cargo::findOrFail($id);
        $cargo->is_active = false;
        $cargo->save();

        return redirect()->route('cargos.index')->with('success', 'Cargo deactivated.');
    }
}
