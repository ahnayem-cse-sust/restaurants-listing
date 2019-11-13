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
        return [
            'result' => true,
            'code' => 200,
            'data' => $data
        ];
    }

    private function responseError(){
        return [
            'result' => false,
            'code' => 501,
            'message' => 'Something Went Wrong!!'
        ];
    }

    private function responseNotFound(){
        return [
            'result' => false,
            'code' => 404,
            'message' => 'Resource Not found!!'
        ];
    }

}
