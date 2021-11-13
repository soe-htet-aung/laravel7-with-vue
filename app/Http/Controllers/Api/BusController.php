<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\BusStop;

class BusController extends Controller {

    /**
     * get buses
     * 
     * @return object $bus
     */
    public function getBus()
    {
        $bus = Bus::all();
        return $bus;
    }

    /**
     * get bus stops
     * 
     * @param $busId
     * @return object $busStops
     */
    public function getBusStops($busId)
    {
        $busStops = BusStop::where('bus_id', $busId)->get();
        return $busStops;
    }

    /**
     * upload YBS data using csv
     * 
     */
    public function updateBusStop() {
        DB::table('bus')->delete();
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

        DB::table('bus_stop')->delete();
        $skipFirstRow = true;
        if (($handle = fopen ( storage_path('Seeder/') . 'BusStop.csv', 'r' )) !== FALSE) {
            while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                if ($skipFirstRow) { $skipFirstRow = false; continue; }
                if (!mb_check_encoding($data, 'UTF-8')) {
                    $data = mb_convert_encoding($data, "UTF-8", "auto");
                }
                $csv_datas[] =[
                    'stop_id' => $data [0],
                    'stop_name' => $data [1],
                    'bus_id' => $data [2],
                    'stop_latitude' => $data [3],
                    'stop_longitude' => $data [4],
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ];
            }
            if (isset($csv_datas)) {
                foreach (array_chunk($csv_datas, 1000) as $data)  {
                    BusStop::insert($data);
                }
            }
            fclose ( $handle );
        }
    }
}
