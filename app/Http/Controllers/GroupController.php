<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    public function index()
    {
        $mainmenu = "group";
        $group = Group::all();
        return view('group')->with(array('group' => $group, 'mainmenu' => $mainmenu));
    }

    public function save(Request $request)
    {
        $group = new Group();
        $group->groupName = $request->input('groupName');
        $group->save();

        return back();
    }

    public function onEdit($id)
    {
        $data = Group::find($id);
        return view('group')->with(array('data' => $data));
    }

    public function edit($id, Request $request)
    {
        $group = Group::find($id);
        $group->groupName = $request->input('groupName');
        $group->save();

        return back();
    }

    public function delete($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();

        return back();
    }
}
