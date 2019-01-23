@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">ข้อมูลการส่งซ่อมครุภัณฑ์</div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="text-align: center">อุปกรณ์ที่ส่งซ่อม</th>
                            <th style="text-align: center">รายละเอียด</th>
                            <th style="text-align: center">วันที่ส่ง</th>
                            <th style="text-align: center">วันที่รับ</th>
                            <th style="text-align: center">หน่วยงาน</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($data) > 0)
                            @foreach($data as $index => $item)
                            <tr>
                                <td>{{$item->nameTitle}}</td>
                                <td>{{$item->detail}}</td>
                                <td style="text-align: center">{{substr( $item->sendDate , 8, 2)}}&nbsp;/&nbsp;{{substr( $item->sendDate , 5, 2)}}&nbsp;/&nbsp;{{substr( $item->sendDate , 0, 4)}}</td>
                                <td style="text-align: center">@if($item->receiveDate != null) {{substr( $item->receiveDate , 8, 2)}}&nbsp;/&nbsp;{{substr( $item->receiveDate , 5, 2)}}&nbsp;/&nbsp;{{substr( $item->receiveDate , 0, 4)}} @else - @endif </td>
                                <td>{{$item->groupName}}</td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5"><center>ไม่มีข้อมูล</center></td>
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
