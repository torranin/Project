@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">ข้อมูลครุภัณฑ์
                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#addData">เพิ่ม</button>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="text-align: center">ลำดับ</th>
                            <th style="text-align: center">อุปกรณ์</th>
                            <th style="text-align: center">สถานะ</th>
                            <th style="text-align: center">หน่วยงาน</th>
                            <th style="text-align: center">แก้ไข</th>
                            <th style="text-align: center">ย้าย</th>
                            <th style="text-align: center">ส่งซ่อม</th>
                            <th style="text-align: center">จำหน่าย</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(count($data) > 0)
                            @foreach($data as $index => $dataDevice)
                                <tr>
                                    <td><center>{{$index+1}}</center></td>
                                    <td>{{$dataDevice->nameTitle}}</td>
                                    <td><center>
                                            @if($dataDevice->status == "normal") ใช้งานปกติ
                                            @elseif($dataDevice->status == "repair") ส่งซ่อม
                                            @elseif($dataDevice->status == "selling") จำหน่าย
                                            @endif
                                        </center>
                                    </td>
                                    <td>{{$dataDevice->groupName}}</td>
                                    <td style="text-align: center">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail-{{$dataDevice->id}}"><span class="glyphicon glyphicon-wrench"></span></button>
                                    </td>
                                    <td style="text-align: center">
                                        {{--<form action="{{route('repair.delete', ['id' => $datas->id])}}">--}}
                                        <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#move-{{$dataDevice->id}}" href="{{route('dataDevice.onEdit', ['id' => $dataDevice->id])}}" ><span class="glyphicon glyphicon-refresh"></span></button>
                                        {{--</form>--}}
                                    </td>
                                    <td style="text-align: center">
                                        {{--<form action="{{route('repair.delete', ['id' => $datas->id])}}">--}}
                                        <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#repair-{{$dataDevice->id}}" href="{{route('dataDevice.onEdit', ['id' => $dataDevice->id])}}" ><span class="glyphicon glyphicon-warning-sign"></span></button>
                                        {{--</form>--}}
                                    </td>
                                    <td style="text-align: center">
                                        {{--<form action="{{route('repair.delete', ['id' => $datas->id])}}">--}}
                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-{{$dataDevice->id}}" href="{{route('dataDevice.onEdit', ['id' => $dataDevice->id])}}"><span class="glyphicon glyphicon-trash"></span></button>
                                        {{--</form>--}}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8"><center>ไม่มีข้อมูล</center></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal AddData-->
<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
            </div>
            <form method="POST" action="{{route('dataDevice.save')}}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <label for="exampleFormControlSelect"></label>
                    <select class="form-control" id="exampleFormControlSelect" name="deviceId" >
                        <option value="">ประเภทครุภัณฑ์</option>
                        @foreach($device as $devices)
                            <option value="{{$devices->id}}">{{$devices->titleName}}</option>
                        @endforeach
                    </select>
                    <label for="exampleFormControlTextarea"></label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="ชื่อครุภัณฑ์" name="nameTitle">
                    <label for="exampleFormControlTextarea"></label>
                    <textarea class="form-control" id="exampleFormControlTextarea" rows="3" placeholder="รายละเอียดครุภัณฑ์" name="detailData"></textarea>
                    <label for="exampleFormControlText"></label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="รหัสครุภัณฑ์" name="codeId">
                    <label for="exampleFormControlSelect"></label>
                    <select class="form-control" id="exampleFormControlSelect" name="groupID" >
                        <option value="">หน่วยงาน</option>
                        @foreach($group as $groups)
                            <option value="{{$groups->id}}">{{$groups->groupName}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" >บันทึก</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal EditData-->
    @foreach($data as $item)
        <div class="modal fade" id="detail-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล</h5>
                    </div>
                    <form method="POST" action="{{route('dataDevice.edit', ['id' => $item->id])}}">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <label for="exampleFormControlText"></label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="ประเภทอครุภัณฑ์" value="{{$item->titleName}}" disabled>
                            <label for="exampleFormControlText"></label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="ชื่อครุภัณฑ์" name="nameTitle" value="{{$item->nameTitle}}">
                            <label for="exampleFormControlTextarea"></label>
                            <textarea class="form-control" id="exampleFormControlTextarea" rows="3" placeholder="รายละเอียดอครุภัณฑ์" name="detailData">{{$item->detailData}}</textarea>
                            <label for="exampleFormControlText"></label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="รหัสครุภัณฑ์" name="codeId" value="{{$item->codeId}}">
                            <label for="exampleFormControlText"></label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="รหัสครุภัณฑ์" value="{{$item->groupName}}" disabled>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" >บันทึก</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

<!-- Modal MoveData-->
@foreach($data as $item)
    <div class="modal fade" id="move-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ย้ายผหน่วยงานู้รับผิดชอบอุปกรณ์</h5>
                </div>
                <form method="POST" action="{{route('dataDevice.move', ['id' => $item->id])}}">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <label for="exampleFormControlSelect"></label>
                        <select class="form-control" id="exampleFormControlSelect" name="groupID" >
                            <option value="">หน่วยงาน</option>
                            @foreach($group as $groups)
                                <option value="{{$groups->id}}">{{$groups->groupName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >จำหน่าย</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

<!-- Modal RepairData-->
@foreach($data as $item)
    <div class="modal fade" id="repair-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ส่งซ่อมอุปกรณ์</h5>
                </div>
                <form method="POST" action="{{route('dataDevice.repair', ['id' => $item->id])}}">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="รายละเอียด" name="detail">
                        <br>
                        <center><button type="submit" class="btn btn-primary" >บันทึกส่งซ่อม </button></center>
                    </div>
                </form>
                <form method="POST" action="{{route('dataDevice.receive', ['id' => $item->id])}}">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <br>
                        <center><button type="submit" class="btn btn-primary" >บันทึกรับของ</button></center>
                    </div>
                </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    </div>
            </div>
        </div>
    </div>
@endforeach

<!-- Modal SellingData-->
@foreach($data as $item)
    <div class="modal fade" id="delete-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">จำหน่ายอุปกรณ์</h5>
                </div>
                <form method="POST" action="{{route('dataDevice.sell', ['id' => $item->id])}}">
                    {{ csrf_field() }}
                    <br>
                    <center><h4>คุณต้องการจำหน่ายอุปกรณ์ใช่หรือไม่</h4></center>
                    <br>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >จำหน่าย</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

@endsection
