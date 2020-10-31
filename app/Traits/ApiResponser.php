<?php
//NEW for standardizing responses
namespace App\Traits;
use Illuminate\Http\Response;

trait ApiResponser
{
    public function successResponse($data, $code = Response::HTTP_OK){// If connection patches through.
        return response()->json(['data' => $data], $code);
    }

    public function errorResponse($message, $code){// :/
        return response()->json(['error' => $message, 'code' => $code], $code);
    }
}
//READ AFTER POSTMAN v
/*Doing this changes output of POSTMAN by grabbing data from the DB as 
evidenced by "data:"
*/