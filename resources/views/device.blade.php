@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">อุปกรณ์ <right><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#addData">เพิ่ม</button></right></div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="text-align: center">ลำดับ</th>
                            <th style="text-align: center">หน่วยงาน</th>
                            <th style="text-align: center">แก้ไข</th>
                            <th style="text-align: center">ลบ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($device) > 0)
                            @foreach($device as $index => $devices)
                                <tr>
                                    <td><center>{{$index+1}}</center></td>
                                    <td>{{$devices->titleName}}</td>
                                    <td style="text-align: center">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail-{{$devices->id}}" href="{{route('device.onEdit', ['id' => $devices->id])}}"><span class="glyphicon glyphicon-wrench"></span></button>
                                    </td>
                                    <td style="text-align: center">
                                        {{--<form action="{{route('group.delete', ['id' => $groups->id])}}">--}}
                                            <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-{{$devices->id}}" href="{{route('device.onEdit', ['id' => $devices->id])}}"><span class="glyphicon glyphicon-trash"></span></button>
                                        {{--</form>--}}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4"><center>ไม่มีข้อมูล</center></td>
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
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลอุปกรณ์</h5>
            </div>
            <form method="POST" action="{{route('device.save')}}">
                {{ csrf_field() }}
            <div class="modal-body">
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="อุปกรณ์" name="titleName">
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
    @foreach($device as $item)
        <div class="modal fade" id="detail-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลอุปกรณ์</h5>
                    </div>
                    <form method="POST" action="{{route('device.edit', ['id' => $item->id])}}">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="หน่วยงาน" name="titleName" value="{{$item->titleName}}">
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

<!-- Modal DeleteData-->
    @foreach($device as $itemOne)
        <div class="modal fade" id="delete-{{$itemOne->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ลบข้อมูลอุปกรณ์</h5>
                    </div>
                    <form method="POST" action="{{route('device.delete', ['id' => $itemOne->id])}}">
                        {{ csrf_field() }}
                        <br>
                            <center><h4>คุณต้องการลบข้อมูลใช่หรือไม่</h4></center>
                        <br>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" >ลบ</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

@endsection