<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    $query = \App\Models\Cargo::with('client');

    if ($search) {
        $query->where('description', 'like', "%{$search}%")
              ->orWhere('cargo_type', 'like', "%{$search}%");
    }

    $cargos = $query->paginate(10)->withQueryString();

    return view('cargos.index', compact('cargos', 'search'));
}

}
