<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class StatusController extends Controller
{
	public function getStatus(Request $request)
    {
		$validator = Validator::make($request->all(), [
	        'currDateTime' => 'required|date_format:Y-m-d H:i:s'
	    ]);

	    if ($validator->fails()) {
	        return response()->json(['error' => ['type' => 'validation_failed', 'fields' => $validator->errors(), 'message' => 'Missing request parameter.']], 400);
	    }
	    $date = $request->get("currDateTime");
	    return Status::getStatusAvailables($date);
	}
}