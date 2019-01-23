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
                            <th style="text-align: center">ปัญหาที่พบ/กิจกรรม</th>
                            <th style="text-align: center">สาเหตุ</th>
                            <th style="text-align: center">การแก้ไข</th>
                            <th style="text-align: center">วัน / เดือน / ปี</th>
                            <th style="text-align: center">หน่วยงาน</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(count($data) > 0)
                            @foreach($data as $index => $datas)
                                <tr>
                                    <td><center>{{$index+1}}</center></td>
                                    <td>{{$datas->problemsDetail}}</td>
                                    <td>{{$datas->cause}}</td>
                                    <td>{{$datas->editing}}</td>
                                    <td style="text-align: center">{{substr( $datas->date , 8, 2)}}&nbsp;/&nbsp;{{substr( $datas->date , 5, 2)}}&nbsp;/&nbsp;{{substr( $datas->date , 0, 4)}}</td>
                                    <td>{{$datas->groupName}}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6"><center>ไม่มีข้อมูล</center></td>
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
