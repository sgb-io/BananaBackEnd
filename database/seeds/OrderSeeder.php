<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('orders')->truncate();
      $sweeties = App\Sweety::all();

      $orders = [
        [$sweeties->random(), $sweeties->random()],
        [$sweeties->random(), $sweeties->random()],
        [$sweeties->random(), $sweeties->random()],
        [$sweeties->random(), $sweeties->random()],
        [$sweeties->random(), $sweeties->random()],
      ];
      foreach ($orders as $order) {
        $newOrder = new App\Order;
        $newOrder->total = $order[0]->price + $order[1]->price;
        $newOrder->save();
        foreach ($order as $sweety) {
          $newOrder->sweeties()->attach(App\Sweety::findOrFail($sweety->id));
        }
        $newOrder->save();
      }
    }
}
