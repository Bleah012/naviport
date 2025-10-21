<?php

namespace App\Http\Controllers;

use App\Models\Port;
use Illuminate\Http\Request;

class PortController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Port::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('country', 'like', "%{$search}%");
        }

        $ports = $query->paginate(10)->withQueryString();

        return view('ports.index', compact('ports', 'search'));
    }

    public function create()
    {
        return view('ports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:100',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'docking_capacity' => 'nullable|numeric|min:0',
            'customs_authorized' => 'nullable|boolean',
        ]);

        Port::create($request->all());

        return redirect()->route('ports.index')->with('success', 'Port added successfully.');
    }

    public function edit($id)
    {
        $port = Port::findOrFail($id);
        return view('ports.edit', compact('port'));
    }

    public function update(Request $request, $id)
    {
        $port = Port::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:100',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'docking_capacity' => 'nullable|numeric|min:0',
            'customs_authorized' => 'nullable|boolean',
        ]);

        $port->update($request->all());

        return redirect()->route('ports.index')->with('success', 'Port updated successfully.');
    }

    public function destroy($id)
    {
        $port = Port::findOrFail($id);
        $port->is_active = false;
        $port->save();

        return redirect()->route('ports.index')->with('success', 'Port archived.');
    }
}
