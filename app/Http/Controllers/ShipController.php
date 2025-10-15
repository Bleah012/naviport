<?php

namespace App\Http\Controllers;

use App\Models\Ship;
use Illuminate\Http\Request;

class ShipController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    $query = \App\Models\Ship::query();

    if ($search) {
        $query->where('name', 'like', "%{$search}%")
              ->orWhere('ship_type', 'like', "%{$search}%");
    }

    $ships = $query->paginate(10)->withQueryString();

    return view('ships.index', compact('ships', 'search'));
}

}
