<?php

namespace App\Queries;

use App\Models\House;

final class SearchHouses
{
  /**
   * @return \App\Models\House[]
   */
  public static function get(array $filter, int $per_page = 20)
  {
    $query = new House();

    if (isset($filter['name'])) {
      $query = $query->where('name', 'LIKE', '%'.$filter['name'].'%');
    }

    if (isset($filter['bedrooms'])) {
      $query = $query->where('bedrooms', $filter['bedrooms']);
    }

    if (isset($filter['bathrooms'])) {
      $query = $query->where('bathrooms', $filter['bathrooms']);
    }

    if (isset($filter['storeys'])) {
      $query = $query->where('storeys', $filter['storeys']);
    }

    if (isset($filter['garages'])) {
      $query = $query->where('garages', $filter['garages']);
    }

    if (isset($filter['min_price'])) {
      $query = $query->where('price', '>=', $filter['min_price']);
    }

    if (isset($filter['max_price'])) {
      $query = $query->where('price', '<=', $filter['max_price']);
    }

    return $query->paginate($per_page);
  }
}