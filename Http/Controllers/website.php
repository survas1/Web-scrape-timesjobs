<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class website extends Controller
{
    function index()
    {
        $result = DB::select(DB::raw("SELECT COUNT(*) AS Tipe_Film, TYPE FROM anime_2 GROUP BY TYPE"));
        $chartData="";

        foreach($result as $list)
        {
            $chartData.="['".$list->TYPE."'    ".$list->Tipe_Film."],";
        }
        $arr['chartData'] = rtrim($chartData,",");
        return view('chart', $arr);
    }
}
