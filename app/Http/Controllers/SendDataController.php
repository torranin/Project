<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class SendDataController extends Controller
{
    public function twelveFile()
    {
        $mainmenu = "sendData";
        return view('sendData12file')->with(array('mainmenu' => $mainmenu));
    }

    public function fortyThreeFileCM()
    {
        $mainmenu = "sendData";
        return view('sendData43fileCM')->with(array('mainmenu' => $mainmenu));
    }

    public function fortyThreeFileNHSO()
    {
        $mainmenu = "sendData";
        $group = Group::all();
        return view('sendData43fileNHSO')->with(array('group' => $group, 'mainmenu' => $mainmenu));
    }

}
