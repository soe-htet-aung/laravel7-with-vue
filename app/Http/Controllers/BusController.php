<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;

class BusController extends Controller
{
    public function index() {
		Log::info("index");
	}
}
