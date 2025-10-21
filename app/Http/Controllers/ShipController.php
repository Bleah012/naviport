<?php

namespace App\Http\Controllers;

use App\Models\Ship;
use Illuminate\Http\Request;

class ShipController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Ship::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%")
      ->orWhere('type', 'like', "%{$search}%");

        }

        $ships = $query->paginate(10)->withQueryString();

        return view('ships.index', compact('ships', 'search'));
    }

    public function create()
    {
        return view('ships.create');
    }

       // Store new ship
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'registration_number' => 'required|string|unique:ships',
            'capacity' => 'required|numeric|min:0.1',
            'ship_type' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        Ship::create($request->all());

        return redirect()->route('ships.index')->with('success', 'Ship added successfully.');
    }

       // Show edit form
    public function edit($id)
    {
        $ship = Ship::findOrFail($id);
        return view('ships.edit', compact('ship'));
    }
      //  Update ship
    public function update(Request $request, Ship $ship)
{
    $validated = $request->validate([
        'name' => 'required|string|max:100',
        'type' => 'required|string|max:100',
        'capacity' => 'required|numeric|min:0',
        'is_active' => 'nullable|boolean',
    ]);

    $ship->update([
        'name' => $validated['name'],
        'type' => $validated['type'],
        'capacity' => $validated['capacity'],
        'is_active' => $request->has('is_active'),
    ]);

    return redirect()->route('ships.index')->with('success', 'Ship updated successfully.');
}


    //  Deactivate ship
    public function destroy($id)
    {
        $ship = Ship::findOrFail($id);
        $ship->is_active = false;
        $ship->save();

        return redirect()->route('ships.index')->with('success', 'Ship decommissioned.');
    }
}
