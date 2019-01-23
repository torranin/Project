<?php

namespace App\Http\Controllers;

use App\Device;
use App\Group;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        $mainmenu = "group";
        $device = Device::all();
        return view('device')->with(array('device' => $device, 'mainmenu' => $mainmenu));
    }

    public function save(Request $request)
    {
        $device = new Device();
        $device->titleName = $request->input('titleName');
        $device->save();

        return back();
    }

    public function onEdit($id)
    {
        $device = Device::find($id);
        return view('group')->with(array('device' => $device));
    }

    public function edit($id, Request $request)
    {
        $device = Device::find($id);
        $device->titleName = $request->input('titleName');
        $device->save();

        return back();
    }

    public function delete($id)
    {
        $device = Device::findOrFail($id);
        $device->delete();

        return back();
    }

}
