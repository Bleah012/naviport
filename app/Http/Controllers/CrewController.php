<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use Illuminate\Http\Request;

class CrewController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    $query = \App\Models\Crew::query();

    if ($search) {
        $query->where('first_name', 'like', "%{$search}%")
              ->orWhere('last_name', 'like', "%{$search}%")
              ->orWhere('role', 'like', "%{$search}%");
    }

    $crews = $query->paginate(10)->withQueryString();

    return view('crews.index', compact('crews', 'search'));
}

}
