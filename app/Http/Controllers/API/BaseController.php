<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;


class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }
    public function sendDone($message)
    {
        $response = [
            'success' => true,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }
    public function sendErrorResponse($message,$error)
    {
        $response = [
            'success' => false,
            'message' => $message,
        ];
        if(!empty($error)){
            $response['error'] = $error;
        }
        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }
}