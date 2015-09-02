<?php

use Illuminate\Database\Seeder;

class SweetySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('sweeties')->truncate();
      $sweets = [
        [
          'name' => 'Apple',
          'price' => 14.5
        ],
        [
          'name' => 'Banana',
          'price' => 21
        ],
        [
          'name' => 'Orange',
          'price' => 7.5
        ],
        [
          'name' => 'Chocolate',
          'price' => 8.2
        ],
        [
          'name' => 'Pizza',
          'price' => 22.5
        ],
        [
          'name' => 'Steak',
          'price' => 25.8
        ],
        [
          'name' => 'Burger',
          'price' => 13
        ]
      ];
      foreach ($sweets as $sweet) {
        $sweety = new App\Sweety([
          'name' => $sweet['name'],
          'price' => $sweet['price']
        ]);
        $sweety->save();
      }

    }
}
