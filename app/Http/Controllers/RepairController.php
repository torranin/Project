<?php

namespace App\Http\Controllers;

use App\Group;
use App\Repair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RepairController extends Controller
{
    public function index()
    {
        $mainmenu = "repair";
        $group = Group::all();
        $data = Repair::join('groups', 'repairs.groupId', '=', 'groups.id')
            ->orderBy('repairs.date', 'desc')
            ->select('repairs.*', 'groups.groupName')
            ->get();
        return view('repair')->with(array('data' => $data, 'group' => $group, 'mainmenu' => $mainmenu));
    }

    public function save(Request $request)
    {
        $repair = new Repair();
        $repair->groupId = $request->input('groupID');
        $repair->problemsDetail = $request->input('problemsDetail');
        $repair->cause = $request->input('cause');
        $repair->editing = $request->input('editing');
        $repair->date = date("Y-m-d");
        $repair->save();

        return back();
    }

    public function onEdit($id)
    {
        $data = Repair::join('groups', 'repairs.groupId', '=', 'groups.id')
                ->where('repairs.id', $id)
            ->select('repairs.*', 'groups.groupName')
                ->get();
        return view('repair')->with(array('data' => $data));
    }

    public function edit($id, Request $request)
    {
        $repair = Repair::find($id);
        $repair->groupId = $request->input('groupID');
        $repair->problemsDetail = $request->input('problemsDetail');
        $repair->cause = $request->input('cause');
        $repair->editing = $request->input('editing');
        $repair->save();

        return back();
    }

    public function delete($id)
    {
        $repair = Repair::findOrFail($id);
        $repair->delete();

        return back();

    }


}
