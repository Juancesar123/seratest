<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
class FilterController extends Controller
{
    public function index(){
        $file_path = realpath(__DIR__ . '/../../../public/data.json');
      //  dd($file_path);
        $json = json_decode(file_get_contents($file_path,null), true);

       // dd($json['data']['response']['billdetails'] );
        $dataresult = array();
        foreach ($json['data']['response']['billdetails'] as $key => $value) {
            $array = explode(': ', $value['body'][0], 2);
            $string = end($array);
           //
            if ((int)$string >= 100000 ) {
                $dataresult[] = (int)$string;
            }
        }
        var_dump($dataresult);
    }
}
