<?php

namespace App\Http\Controllers;

use App\DataDevice;
use App\Group;
use App\SendDevice;
use Illuminate\Http\Request;

class SendDeviceController extends Controller
{
    public function index()
    {
        $mainmenu = "dataDevice";
        $data = DataDevice::join('send_devices', 'data_devices.id', '=', 'send_devices.dataDeviceId')
            ->join('groups', 'data_devices.groupId', '=', 'groups.id')
            ->orderBy('send_devices.sendDate', 'desc')
            ->get();
        return view('sendDevice')->with(array('data' => $data, 'mainmenu' => $mainmenu));
    }

    public function save(Request $request)
    {
        $sendDevice = new sendDevice();
        $sendDevice->groupID = $request->input('groupID');
        $sendDevice->device = $request->input('device');
        $sendDevice->detail = $request->input('detail');
        $sendDevice->sendDate = $request->input('sendDate');
        $sendDevice->status = $request->input('status');
        $sendDevice->save();

        return back();
    }

    public function onEdit($id)
    {
        $data = SendDevice::find($id);
        return view('sendDevice')->with(array('data' => $data));
    }

    public function edit($id, Request $request)
    {
        $sendDevice = SendDevice::find($id);
        $sendDevice->device = $request->input('device');
        $sendDevice->detail = $request->input('detail');
        $sendDevice->receiveDate = $request->input('receiveDate');
        $sendDevice->sendGroupDate = $request->input('sendGroupDate');
        $sendDevice->status = $request->input('status');
        $sendDevice->save();

        return back();
    }

    public function delete($id)
    {
        $sendDevice = SendDevice::findOrFail($id);
        $sendDevice->delete();

        return back();
    }
}
