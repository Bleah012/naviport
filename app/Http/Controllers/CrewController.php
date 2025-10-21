<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use Illuminate\Http\Request;

class CrewController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Crew::query();

        if ($search) {
            $query->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('role', 'like', "%{$search}%");
        }

        $crews = $query->paginate(10)->withQueryString();

        return view('crews.index', compact('crews', 'search'));
    }

    public function create()
    {
        return view('crews.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'role' => 'required|string|max:100',
            'phone_number' => 'required|string|unique:crews,phone_number',
            'nationality' => 'nullable|string|max:100',
        ]);

        Crew::create($request->all());

        return redirect()->route('crews.index')->with('success', 'Crew member added successfully.');
    }

    public function edit($id)
    {
        $crew = Crew::findOrFail($id);
        return view('crews.edit', compact('crew'));
    }

    public function update(Request $request, $id)
    {
        $crew = Crew::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'role' => 'required|string|max:100',
            'phone_number' => 'required|string|unique:crews,phone_number,' . $id,
            'nationality' => 'nullable|string|max:100',
        ]);

        $crew->update($request->all());

        return redirect()->route('crews.index')->with('success', 'Crew member updated successfully.');
    }

    public function destroy($id)
    {
        $crew = Crew::findOrFail($id);
        $crew->is_active = false;
        $crew->save();

        return redirect()->route('crews.index')->with('success', 'Crew member deactivated.');
    }
}
