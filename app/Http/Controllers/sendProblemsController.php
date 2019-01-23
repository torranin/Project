<?php

namespace App\Http\Controllers;

use App\DoActive;
use App\Group;
use Illuminate\Http\Request;

class SendProblemsController extends Controller
{
    public function index()
    {
        $group = Group::all();
        return view('sendProblems')->with(array('group' => $group));
    }

    public function save(Request $request)
    {
//        if ($request->input('id')) {
//            $activity = DoActive::find($request->input('id'));
//        } else {
//            $activity = new DoActive();
//        }

        $activity = new DoActive();
        $activity->groupId = $request->input('groupId');
        $activity->problemsDetail = $request->input('problemsDetail');
        $activity->urgency = $request->input('urgency');
        $activity->status = "no";
        $activity->deviceId = 0;

        $activity->save();

        return redirect('sendProblems')->with('popup', 'open');
    }

}
