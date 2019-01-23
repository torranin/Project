<?php

namespace App\Http\Controllers;

use App\DoActive;
use Illuminate\Http\Request;
use App\Group;
use DB;

class ReportController extends Controller
{
    public function index()
    {
        $mouth = date("m");
        $year = date("Y");
        $start = $year."-".$mouth."-".'01';
        $end = $year."-".$mouth."-".'30';
        $mainmenu = "report";
        $data = Group::join('do_actives', 'groups.id', '=', 'do_actives.groupId')->whereBetween('do_actives.created_at', [$start,$end])->orderBy('do_actives.created_at', 'desc')->get();

        return view('report')->with(array('data' => $data, 'mainmenu' => $mainmenu));
    }

    public function group()
    {
        $mainmenu = "report";
        $data = Group::all();
        return view('reportGroup')->with(array('data' => $data, 'mainmenu' => $mainmenu, 'controller' => $this));
    }

    public function findDate()
    {
        $mainmenu = "report";
        $data = Group::all();
        return view('reportGroup')->with(array('data' => $data, 'mainmenu' => $mainmenu, 'controller' => $this));
    }

    public function getGroup($id)
    {
        $query = DoActive::select('*')->where('groupId', $id)->count('groupId');
        return $query;
    }


}
