<?php

namespace App\Http\Controllers;

use App\DataDevice;
use App\Device;
use App\Group;
use App\SendDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dataDeviceController extends Controller
{
    public function index()
    {
        $mainmenu = "dataDevice";
        $group = Group::all();
        $device = Device::all();
        $data = DataDevice::join('groups', 'data_devices.groupId', '=', 'groups.id')
            ->join('devices', 'data_devices.deviceId', '=', 'devices.id')
            ->where('data_devices.status', '=', 'normal')
            ->orWhere('data_devices.status', '=', 'repair')
            ->select('data_devices.*', 'groups.groupName', 'devices.titleName')
            ->get();
        return view('dataDevice')->with(array('data' => $data, 'device' => $device, 'group' => $group, 'mainmenu' => $mainmenu));
    }

    public function selling()
    {
        $mainmenu = "dataDevice";
        $group = Group::all();
        $device = Device::all();
        $data = DataDevice::join('groups', 'data_devices.groupId', '=', 'groups.id')
            ->join('devices', 'data_devices.deviceId', '=', 'devices.id')
            ->where('data_devices.status', '=', 'selling')
            ->select('data_devices.*', 'groups.groupName', 'devices.titleName')
            ->get();
        return view('dataDeviceSell')->with(array('data' => $data, 'device' => $device, 'group' => $group, 'mainmenu' => $mainmenu));
    }

    public function save(Request $request)
    {
        $dataDevice = new DataDevice();
        $dataDevice->groupId = $request->input('groupID');
        $dataDevice->deviceId = $request->input('deviceId');
        $dataDevice->nameTitle = $request->input('nameTitle');
        $dataDevice->detailData = $request->input('detailData');
        $dataDevice->codeId = $request->input('codeId');
        $dataDevice->status = 'normal';
        $dataDevice->save();

        return back();
    }

    public function onEdit($id)
    {
        $dataDevice = DataDevice::find($id);
        return view('group')->with(array('dataDevice' => $dataDevice));
    }

    public function edit($id, Request $request)
    {

        $dataDevice = DataDevice::find($id);
        $dataDevice->detailData = $request->input('detailData');
        $dataDevice->nameTitle = $request->input('nameTitle');
        $dataDevice->codeId = $request->input('codeId');
        $dataDevice->save();

        return back();
    }

    public function move($id, Request $request)
    {
        $dataDevice = DataDevice::find($id);
        $dataDevice->groupId = $request->input('groupID');
        $dataDevice->save();



        return back();
    }

    public function repair($id, Request $request)
    {
        $dataDevice = DataDevice::find($id);
        $dataDevice->status = 'repair';
        $dataDevice->save();

        $sendDevice = new SendDevice();
        $sendDevice->dataDeviceId = $id;
        $sendDevice->detail = $request->input('detail');
        $sendDevice->sendDate = date('Y-m-d');;
        $sendDevice->save();

        return back();
    }

    public function receive($id, Request $request)
    {
        $dataDevice = DataDevice::find($id);
        $dataDevice->status = 'normal';
        $dataDevice->save();

//        $sendDevice = SendDevice::find($dataDeviceId);
//        $sendDevice->receiveDate = date('Y-m-d');
//        $sendDevice->save();
        DB::table('send_devices')->where('dataDeviceId', $id)->update(['receiveDate' => date('Y-m-d')]);


        return back();
    }

    public function sell($id, Request $request)
    {
        $dataDevice = DataDevice::find($id);
        $dataDevice->status = 'selling';
        $dataDevice->save();

        return back();
    }

    public function delete($id)
    {
        $dataDevice = DataDevice::findOrFail($id);
        $dataDevice->delete();

        return back();
    }

}
