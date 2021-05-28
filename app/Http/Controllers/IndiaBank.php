<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branche;

class IndiaBank extends Controller
{
    //
    function getdata(){
        $branch = isset($_GET['q']) ? $_GET['q'] : '';
        $limit = isset($_GET['limit']) ? $_GET['limit'] : 2;
        $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
        $data = Branche::where('branch', 'like', '%'.$branch.'%')->offset($offset)
        ->limit($limit)->get();
        return $data;
    }
    
    function getdataCity(){
        $branch = isset($_GET['cityname']) ? $_GET['cityname'] : '';
        $searchtext = isset($_GET['searchvalue']) ? $_GET['searchvalue'] : '';
        $data = Branche::where('city', 'like', '%'.$branch.'%')
                   ->where('ifsc', 'like', '%'.$searchtext.'%')
                    ->paginate(50);
        $city = Branche::select('city')
        ->groupBy('city')
        ->get();
        return view('bank',['data'=>$data],['city'=>$city]);
    }

    function getapidataCity(){
        $branch = isset($_GET['cityname']) ? $_GET['cityname'] : '';
        $data = Branche::where('city', 'like', '%'.$branch.'%')
        ->paginate(50);
        return $data;
    }
}
