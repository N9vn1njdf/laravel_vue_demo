<?php

use Illuminate\Database\Seeder;
use App\Models\House;

class HouseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $path = storage_path('property-data.csv');
    $handle = fopen($path, 'r ');
    $data = fgetcsv($handle);

    while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
      House::create([
        'name' => $row[0],
        'price' => $row[1],
        'bedrooms' => $row[2],
        'bathrooms' => $row[3],
        'storeys' => $row[4],
        'garages' => $row[5],
      ]);
    }

    fclose($handle);
  }
}
