<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusStop extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bus_stop';
    protected $primaryKey = 'stop_id';
}
