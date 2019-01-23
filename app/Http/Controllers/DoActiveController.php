<?php

namespace App\Http\Controllers;

use App\DoActive;
use App\Group;
use Illuminate\Http\Request;

class DoActiveController extends Controller
{
    public function index()
    {
        $mainmenu = "activity";
        $group = Group::all();
        $data = DoActive::join('groups', 'do_actives.groupId', '=', 'groups.id')
            ->orderBy('do_actives.created_at', 'desc')
            ->select('do_actives.*', 'groups.groupName')
            ->get();
        return view('activity')->with(array('data' => $data, 'group' => $group, 'mainmenu' => $mainmenu));
    }

    public function onEdit($id)
    {
        $mainmenu = "activity";
        $group = Group::all();
        $data = DoActive::where('id', $id)->first();

        $active_data = DoActive::join('groups', 'do_actives.groupId', '=', 'groups.id')
            ->orderBy('do_actives.created_at', 'desc')
//            ->groupBy('problemsDetail')
            ->select('do_actives.*', 'groups.groupName')
            ->get();

        return view('activity_edit')->with(array('data' => $data, 'active_data' => $active_data, 'group' => $group, 'mainmenu' => $mainmenu));
    }

    public function onDelete($id)
    {
        $data = DoActive::where('id', $id)->first();
        return view('activity')->with(array('data' => $data));
    }

    public function save(Request $request)
    {
        if ($request->input('id')) {
            $activity = DoActive::find($request->input('id'));
        } else {
            $activity = new DoActive();
        }

        $activity->groupId = $request->input('groupId');
        $activity->problemsDetail = $request->input('problemsDetail');
        $activity->cause = $request->input('cause');
        $activity->editing = $request->input('editing');

        $activity->deviceId = 0;

        $activity->save();

        return back();
    }

    public function edit($id, Request $request)
    {
        $activity = DoActive::find($id);
        $activity->groupId = $request->input('groupID');
        $activity->problemsDetail = $request->input('problemsDetail');
        $activity->cause = $request->input('cause');
        $activity->editing = $request->input('editing');
        $activity->save();

        return back();
    }

    public function delete($id)
    {
        $activity = DoActive::find($id);
        $activity->delete();
        return back();

    }
}
