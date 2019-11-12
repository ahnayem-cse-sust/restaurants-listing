<?php


namespace App\Services;

use App\Restaurant;

class RestaurantService
{
    public function __construct()
    {
        ;
    }

    public function dataGenerate()
    {
        $csvData = $this->csvToArray("Resturants.csv");
        $header = str_replace('"','',explode(',', $csvData[0][0]));

        Restaurant::truncate();
        for ($i = 1; $i < count($csvData); $i++) {
            $arr = str_replace('"','',explode(',', $csvData[$i][0]));
            if(count($arr) > 21)
            {
                unset($arr[21]);
            }
            $d = array_combine($header,$arr);
            $restaurant = new Restaurant();
            $restaurant->id = $d['id'];
            $restaurant->name = $d['name'];
            $restaurant->branch = $d['branch'];
            $restaurant->phone = $d['phone'];
            $restaurant->email = $d['email'];
            $restaurant->logo = $d['logo'];
            $restaurant->address = $d['address'];
            $restaurant->housenumber = $d['housenumber'];
            $restaurant->postcode = $d['postcode'];
            $restaurant->city = $d['city'];
            $restaurant->latitude = $d['latitude'];
            $restaurant->longitude = $d['longitude'];
            $restaurant->url = $d['url'];
            $restaurant->open = $d['open'];
            $restaurant->bestMatch = $d['bestMatch'];
            $restaurant->newestScore = $d['newestScore'];
            $restaurant->ratingAverage = $d['ratingAverage'];
            $restaurant->popularity = $d['popularity'];
            $restaurant->averageProductPrice = $d['averageProductPrice'];
            $restaurant->deliveryCosts = $d['deliveryCosts'];
            $restaurant->minimumOrderAmount = $d['minimumOrderAmount'];
            $restaurant->save();
        }
        return[
            'result' => true,
            'message' => "Data successfully updated!!"
        ];
    }

    private function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            $i = 0;
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                $num = count($row);
                for ($c = 0; $c < $num; $c++) {
                    $data[$i][] = $row [$c];
                }
                $i++;
            }
            fclose($handle);
        }

        return $data;
    }

}
