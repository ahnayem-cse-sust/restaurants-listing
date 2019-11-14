<?php


namespace App\Services;


class ApiResponseService
{
    public function __construct()
    {
        ;
    }

    public function response($type,$data = null){
        switch ($type){
            case 'success':
                return $this->responseSuccess($data);
            case 'error':
                return $this->responseError();
            default:
                return $this->responseNotFound();
        }
    }

    private function responseSuccess($data){
        $response =  [
            'result' => true,
            'code' => 200,
            'data' => $data
        ];
        return response()->json($response, 200);
    }

    private function responseError(){
        $response =  [
            'result' => false,
            'code' => 501,
            'message' => 'Something Went Wrong!!'
        ];
        return response()->json($response, 501);
    }

    private function responseNotFound(){
        $response =   [
            'result' => false,
            'code' => 404,
            'message' => 'Resource Not found!!'
        ];
        return response()->json($response, 404);
    }

}
