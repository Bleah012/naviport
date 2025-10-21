<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\Ship;
use App\Models\Client;
use App\Models\Port;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Shipment::with(['ship', 'cargo', 'originPort', 'destinationPort']);


        if ($search) {
            $query->where('cargo_description', 'like', "%{$search}%")
                  ->orWhere('status', 'like', "%{$search}%");
        }

        $shipments = $query->paginate(10)->withQueryString();

        return view('shipments.index', compact('shipments', 'search'));
    }

    public function create()
    {
        $ships = Ship::where('is_active', true)->get();
        $clients = Client::where('is_active', true)->get();
        $ports = Port::where('is_active', true)->get();

        return view('shipments.create', compact('ships', 'clients', 'ports'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ship_id' => 'required|exists:ships,id',
            'client_id' => 'required|exists:clients,id',
            'origin_port_id' => 'required|exists:ports,id',
            'destination_port_id' => 'required|exists:ports,id|different:origin_port_id',
            'departure_date' => 'required|date',
            'arrival_date' => 'nullable|date|after_or_equal:departure_date',
            'cargo_description' => 'required|string|max:255',
            'status' => 'required|string|max:50',
        ]);

        Shipment::create($request->all());

        return redirect()->route('shipments.index')->with('success', 'Shipment created successfully.');
    }

    public function edit($id)
    {
        $shipment = Shipment::findOrFail($id);
        $ships = Ship::where('is_active', true)->get();
        $clients = Client::where('is_active', true)->get();
        $ports = Port::where('is_active', true)->get();

        return view('shipments.edit', compact('shipment', 'ships', 'clients', 'ports'));
    }

    public function update(Request $request, $id)
    {
        $shipment = Shipment::findOrFail($id);

        $request->validate([
            'ship_id' => 'required|exists:ships,id',
            'client_id' => 'required|exists:clients,id',
            'origin_port_id' => 'required|exists:ports,id',
            'destination_port_id' => 'required|exists:ports,id|different:origin_port_id',
            'departure_date' => 'required|date',
            'arrival_date' => 'nullable|date|after_or_equal:departure_date',
            'cargo_description' => 'required|string|max:255',
            'status' => 'required|string|max:50',
        ]);

        $shipment->update($request->all());

        return redirect()->route('shipments.index')->with('success', 'Shipment updated successfully.');
    }

    public function destroy($id)
    {
        $shipment = Shipment::findOrFail($id);
        $shipment->is_active = false;
        $shipment->save();

        return redirect()->route('shipments.index')->with('success', 'Shipment archived.');
    }
}
