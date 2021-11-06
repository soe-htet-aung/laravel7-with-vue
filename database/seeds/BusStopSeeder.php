<?php

use Illuminate\Database\Seeder;
use App\Models\BusStop;

class BusStopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skipFirstRow = true;
        if (($handle = fopen ( storage_path('Seeder/') . 'BusStop.csv', 'r' )) !== FALSE) {
            while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                if ($skipFirstRow) { $skipFirstRow = false; continue; }
                if (!mb_check_encoding($data, 'UTF-8')) {
                    $data = mb_convert_encoding($data, "UTF-8", "auto");
                }
                $csv_data[] =[
                    'stop_id' => $data [0],
                    'stop_name' => $data [1],
                    'bus_id' => $data [2],
                    'bus_name' => $data [3],
                    'stop_latitude' => $data [4],
                    'stop_longitude' => $data [5],
                    'next_stop_latitude' => $data [6],
                    'next_stop_longitude' => $data [7],
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ];
            }
            if (isset($csv_data)) {
                foreach (array_chunk($csv_data, 1000) as $data)  {
                    BusStop::insert($data);
                }
            }
            fclose ( $handle );
        }
    }
}
