@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">ข้อมูลบันทึกการปฏิบัติงาน</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="text-align: center">ลำดับ</th>
                            <th style="text-align: center">สถานะ</th>
                            <th style="text-align: center">ปัญหาที่พบ/กิจกรรม</th>
                            <th style="text-align: center">วัน / เดือน / ปี</th>
                            <th style="text-align: center">เวลา</th>
                            <th style="text-align: center">ความเร่งด่วน</th>
                            <th style="text-align: center">หน่วยงาน</th>
                            <th style="text-align: center">แก้ไข</th>
                            <th style="text-align: center">ลบ</th>
                        </tr>
                        </thead>

                        <tbody>
                        @if(count($data) > 0)
                            @foreach($data as $index => $datas)
                                <tr>
                                    <td><center>{{$index+1}}</center></td>
                                    <td>@if($datas->status == "no")
                                            <center><button type="button" class="btn btn-danger"> </button></center>
                                        @else
                                            <center><button type="button" class="btn btn-success"> </button></center>
                                        @endif</td>
                                    <td>{{$datas->problemsDetail}}</td>
                                    <td style="text-align: center">{{substr( $datas->created_at , 8, 2)}}&nbsp;/&nbsp;{{substr( $datas->created_at , 5, 2)}}&nbsp;/&nbsp;{{substr( $datas->created_at , 0, 4)}}</td>
                                    <td style="text-align: center">{{substr( $datas->created_at , 10, 6)}}</td>
                                    <td>
                                        @if($datas->urgency == "normal")
                                            <span>ปกติ</span>
                                        @elseif($datas->urgency == "express")
                                            <span>ด่วน</span>
                                        @else
                                            <span>ด่วนที่สุด</span>
                                        @endif
                                    </td>
                                    <td>{{$datas->groupName}}</td>
                                    <td style="text-align: center">
                                        <a class="btn btn-info btn-sm" href="{{route('activity.onEdit', ['id' => $datas->id])}}"><span class="glyphicon glyphicon-wrench"></span></a>
                                    </td>
                                    <td style="text-align: center">
                                        {{--<form action="{{route('repair.delete', ['id' => $datas->id])}}">--}}
                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-{{$datas->id}}" href="{{route('activity.onDelete', ['id' => $datas->id])}}"><span class="glyphicon glyphicon-trash"></span></button>
                                        {{--</form>--}}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9"><center>ไม่มีข้อมูล</center></td>
                            </tr>
                        @endif
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
