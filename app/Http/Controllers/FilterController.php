<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
class FilterController extends Controller
{
    public function index(){
        // get real path
        $file_path = realpath(__DIR__ . '/../../../public/data.json');
        $json = json_decode(file_get_contents($file_path,null), true);
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
