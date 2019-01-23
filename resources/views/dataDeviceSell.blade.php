@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">ข้อมูลครุภัณฑ์ที่ถูกจำหน่าย</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="text-align: center">ลำดับ</th>
                            <th style="text-align: center">อุปกรณ์</th>
                            <th style="text-align: center">สถานะ</th>
                            <th style="text-align: center">หน่วยงาน</th>
                            <th style="text-align: center">แก้ไข/หมายเหตุ</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(count($data) > 0)
                            @foreach($data as $index => $dataDevice)
                                <tr>
                                    <td><center>{{$index+1}}</center></td>
                                    <td>{{$dataDevice->nameTitle}}</td>
                                    <td>@if($dataDevice->status == "selling") จำหน่าย @endif</td>
                                    <td>{{$dataDevice->groupName}}</td>
                                    <td style="text-align: center">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail-{{$dataDevice->id}}"><span class="glyphicon glyphicon-wrench"></span></button>
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
@endsection
