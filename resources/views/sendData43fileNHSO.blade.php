@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">การส่งข้อมูล 43 แฟ้ม สปสช. <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#addData">เพิ่ม</button></div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="text-align: center">ลำดับ</th>
                            <th style="text-align: center">วัน / เดือน / ปี</th>
                            <th style="text-align: center">ข้อมูลของเดือน</th>
                            <th style="text-align: center">ผู้ส่ง</th>
                        </tr>
                        </thead>
                        <tbody>

                        {{--@if(count($data) > 0)--}}
                            {{--@foreach($data as $index => $datas)--}}
                                {{--<tr>--}}
                                    {{--<td><center>{{$index+1}}</center></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td style="text-align: center"></td>--}}
                                    {{--<td></td>--}}

                                {{--</tr>--}}
                            {{--@endforeach--}}
                        {{--@else--}}
                            <tr>
                                <td colspan="6"><center>ไม่มีข้อมูล</center></td>
                            {{--</tr>--}}
                        {{--@endif--}}
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
            <form method="POST" action="{{route('activity.save')}}">
            {{ csrf_field() }}
            <div class="modal-body">
                <label for="exampleFormControlTextarea"></label>
                <textarea class="form-control" id="exampleFormControlTextarea" rows="3" name="problemsDetail" placeholder="ปัญหาที่พบ/กิจกรรม"></textarea>
                <label for="exampleFormControlTextarea"></label>
                <textarea class="form-control" id="exampleFormControlTextarea" rows="3" name="cause"placeholder="สาเหตุ"></textarea>
                <label for="exampleFormControlTextarea"></label>
                <textarea class="form-control" id="exampleFormControlTextarea" rows="3" name="editing" placeholder="การแก้ไข"></textarea>
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



@endsection
