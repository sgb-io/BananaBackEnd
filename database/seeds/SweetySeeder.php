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
          'price' => 14.5,
          'type' => 'fruit'
        ],
        [
          'name' => 'Banana',
          'price' => 21,
          'type' => 'fruit'
        ],
        [
          'name' => 'Orange',
          'price' => 7.5,
          'type' => 'fruit'
        ],
        [
          'name' => 'Chocolate',
          'price' => 8.2,
          'type' => 'snack'
        ],
        [
          'name' => 'Pizza',
          'price' => 22.5,
          'type' => 'dinner'
        ],
        [
          'name' => 'Steak',
          'price' => 25.8,
          'type' => 'dinner'
        ],
        [
          'name' => 'Burger',
          'price' => 13,
          'type' => 'dinner'
        ]
      ];
      foreach ($sweets as $sweet) {
        $sweety = new App\Sweety([
          'name' => $sweet['name'],
          'price' => $sweet['price'],
          'type' => $sweet['type']
        ]);
        $sweety->save();
      }

    }
}
