<?php

use Illuminate\Database\Seeder;
use App\Models\Bus;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skipFirstRow = true;
        if (($handle = fopen ( storage_path('Seeder/') . 'Bus.csv', 'r' )) !== FALSE) {
            while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                if ($skipFirstRow) { $skipFirstRow = false; continue; }
                if (!mb_check_encoding($data, 'UTF-8')) {
                    $data = mb_convert_encoding($data, "UTF-8", "auto");
                }
                $csv_data[] =[
                    'bus_id' => $data [0],
                    'bus_name' => $data [1],
                    'price' => $data [2],
                    'bus_line' => $data [3],
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ];
            }
            if (isset($csv_data)) {
                foreach (array_chunk($csv_data, 1000) as $data)  {
                    Bus::insert($data);
                }
            }
            fclose ( $handle );
        }
    }
}
