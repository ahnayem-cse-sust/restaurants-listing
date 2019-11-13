<?php

namespace App\Http\Controllers\Api;

use App\Services\ApiResponseService;
use Illuminate\Http\Request;
use App\Services\RestaurantService;
use App\Http\Controllers\Controller;

class RestaurantController5_12_300 extends Controller
{
    protected $restaurantService;
    /**
     * @var ApiResponseService
     */
    private $apiResponseService;

    public function __construct(RestaurantService $restaurantService,ApiResponseService $apiResponseService)
    {
        $this->restaurantService = $restaurantService;
        $this->apiResponseService = $apiResponseService;
    }

    public function dataGenerate(){
        $response = $this->restaurantService->dataGenerate();
        die(json_encode($this->apiResponseService->response('success',$response)));
    }

    public function getRestaurant(){
        if (!empty(request()->search_by_name)){
            $response = $this->restaurantService->getRestaurantbyName(request()->search_by_name);
        }elseif (!empty(request()->sort_by)){
            $response = $this->restaurantService->getRestaurant(request()->sort_by);
        }else{
            $response = $this->restaurantService->getRestaurant('open');
        }
        $data = $this->restaurantService->nameTagChange($response);
        die(json_encode($this->apiResponseService->response('success',$data)));
    }
}
