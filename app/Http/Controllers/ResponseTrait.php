<?php

namespace App\Http\Controllers;

trait ResponseTrait
{
    public function responseTrait($message = '', $status = false, $body = null)
    {
        return response()->json([
            'status' => $status,
            'body' => $body,
            'message' => $message
        ]);
    }
}
