<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    $query = \App\Models\Shipment::with(['cargo', 'ship', 'originPort', 'destinationPort']);

    if ($search) {
        $query->where('status', 'like', "%{$search}%")
              ->orWhereDate('departure_date', $search)
              ->orWhereDate('arrival_date', $search);
    }

    $shipments = $query->paginate(5)->withQueryString();

    return view('shipments.index', compact('shipments', 'search'));
}

}
