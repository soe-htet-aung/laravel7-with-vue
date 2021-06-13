<?php

use Illuminate\Database\Seeder;
use App\Bus;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 6; $i++) { 
	    	Bus::create([
	            'bus_name' => $i,
	            'price' => 20000 * $i,
	            'bus_line' => Str::random(25),
	        ]);
    	}
    }
}
