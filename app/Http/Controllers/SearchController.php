<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Queries\SearchHouses;

class SearchController extends Controller
{
  public function houses(Request $request)
  {
    $request->validate([
      'name' => 'nullable|string|max:255',
      'bedrooms' => 'nullable|integer|min:0',
      'bathrooms' => 'nullable|integer|min:0',
      'storeys' => 'nullable|integer|min:0',
      'garages' => 'nullable|integer|min:0',
      'min_price' => 'nullable|integer|min:0',
      'max_price' => 'nullable|integer',
    ]);

    $filter = $request->only(
      'name',
      'price',
      'bedrooms',
      'bathrooms',
      'storeys',
      'garages',
      'min_price',
      'max_price',
    );

    $houses = SearchHouses::get($filter);

    return $houses;
  }
}
