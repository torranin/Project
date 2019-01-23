@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">การส่งข้อมูล 12 แฟ้ม <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#addData">เพิ่ม</button></div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="text-align: center">ลำดับ</th>
                            <th style="text-align: center">ปัญหาที่พบ/กิจกรรม</th>
                            <th style="text-align: center">วัน / เดือน / ปี</th>
                            <th style="text-align: center">หน่วยงาน</th>
                            <th style="text-align: center">แก้ไข</th>
                            <th style="text-align: center">ลบ</th>
                        </tr>
                        </thead>
                        <tbody>

                        {{--@if(count($data) > 0)--}}
                            {{--@foreach($data as $index => $datas)--}}
                                {{--<tr>--}}
                                    {{--<td><center>{{$index+1}}</center></td>--}}
                                    {{--<td>{{$datas->problemsDetail}}</td>--}}
                                    {{--<td style="text-align: center">{{substr( $datas->date , 8, 2)}}&nbsp;/&nbsp;{{substr( $datas->date , 5, 2)}}&nbsp;/&nbsp;{{substr( $datas->date , 0, 4)}}</td>--}}
                                    {{--<td>{{$datas->groupName}}</td>--}}
                                    {{--<td style="text-align: center">--}}
                                        {{--<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail-{{$datas->id}}" href="{{route('activity.onEdit', ['id' => $datas->id])}}"><span class="glyphicon glyphicon-wrench"></span></button>--}}
                                    {{--</td>--}}
                                    {{--<td style="text-align: center">--}}
                                        {{--<form action="{{route('repair.delete', ['id' => $datas->id])}}">--}}
                                        {{--<button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-{{$datas->id}}" href="{{route('activity.onEdit', ['id' => $datas->id])}}"><span class="glyphicon glyphicon-trash"></span></button>--}}
                                        {{--</form>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}
                        {{--@else--}}
                            <tr>
                                <td colspan="6"><center>ไม่มีข้อมูล</center></td>
                            </tr>
                        {{--@endif--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{--<!-- Modal AddData-->--}}
{{--<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
    {{--<div class="modal-dialog" role="document">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>--}}
            {{--</div>--}}
            {{--<form method="POST" action="{{route('activity.save')}}">--}}
            {{--{{ csrf_field() }}--}}
            {{--<div class="modal-body">--}}
                {{--<label for="exampleFormControlTextarea"></label>--}}
                {{--<textarea class="form-control" id="exampleFormControlTextarea" rows="3" name="problemsDetail" placeholder="ปัญหาที่พบ/กิจกรรม"></textarea>--}}
                {{--<label for="exampleFormControlTextarea"></label>--}}
                {{--<textarea class="form-control" id="exampleFormControlTextarea" rows="3" name="cause"placeholder="สาเหตุ"></textarea>--}}
                {{--<label for="exampleFormControlTextarea"></label>--}}
                {{--<textarea class="form-control" id="exampleFormControlTextarea" rows="3" name="editing" placeholder="การแก้ไข"></textarea>--}}
                {{--<label for="exampleFormControlSelect"></label>--}}
                {{--<select class="form-control" id="exampleFormControlSelect" name="groupID" >--}}
                    {{--<option value="">หน่วยงาน</option>--}}
                    {{--@foreach($group as $groups)--}}
                        {{--<option value="{{$groups->id}}">{{$groups->groupName}}</option>--}}
                    {{--@endforeach--}}
                {{--</select>--}}
            {{--</div>--}}
            {{--<div class="modal-footer">--}}
                {{--<button type="submit" class="btn btn-primary" >บันทึก</button>--}}
                {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>--}}
            {{--</div>--}}
            {{--</form>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}


{{--<!-- Modal EditData-->--}}
{{--@if($data)--}}
    {{--@foreach($data as $item)--}}
        {{--<div class="modal fade" id="detail-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
            {{--<div class="modal-dialog" role="document">--}}
                {{--<div class="modal-content">--}}
                    {{--<div class="modal-header">--}}
                        {{--<h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล</h5>--}}
                    {{--</div>--}}
                    {{--<form method="POST" action="{{route('activity.edit', ['id' => $item->id])}}">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--<div class="modal-body">--}}


                            {{--<label for="exampleFormControlTextarea"></label>--}}
                            {{--<textarea class="form-control" id="exampleFormControlTextarea" rows="3" name="problemsDetail" placeholder="ปัญหาที่พบ/กิจกรรม">{{$item->problemsDetail}}</textarea>--}}

                            {{--<label for="exampleFormControlTextarea"></label>--}}
                            {{--<textarea class="form-control" id="exampleFormControlTextarea" rows="3" name="cause" placeholder="สาเหตุ">{{$item->cause}}</textarea>--}}

                            {{--<label for="exampleFormControlTextarea"></label>--}}
                            {{--<textarea class="form-control" id="exampleFormControlTextarea" rows="3" name="editing" placeholder="การแก้ไข">{{$item->editing}}</textarea>--}}

                            {{--<label for="exampleFormControlSelect"></label>--}}
                            {{--<select class="form-control" id="exampleFormControlSelect" name="groupID" >--}}
                                {{--@foreach($group as $groups)--}}
                                    {{--<option value="{{$groups->id}}" @if($groups->id==$item->groupId) selected @endif>{{$groups->groupName}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}
                        {{--<div class="modal-footer">--}}
                            {{--<button type="submit" class="btn btn-primary" >บันทึก</button>--}}
                            {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endforeach--}}
{{--@endif--}}

{{--<!-- Modal DeleteData-->--}}
{{--@if($data)--}}
    {{--@foreach($data as $itemOne)--}}
        {{--<div class="modal fade" id="delete-{{$itemOne->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
            {{--<div class="modal-dialog" role="document">--}}
                {{--<div class="modal-content">--}}
                    {{--<div class="modal-header">--}}
                        {{--<h5 class="modal-title" id="exampleModalLabel">ลบข้อมูล</h5>--}}
                    {{--</div>--}}
                    {{--<form method="POST" action="{{route('activity.delete', ['id' => $itemOne->id])}}">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--<br>--}}
                        {{--<center><h4>คุณต้องการลบข้อมูลใช่หรือไม่</h4></center>--}}
                        {{--<br>--}}
                        {{--<div class="modal-footer">--}}
                            {{--<button type="submit" class="btn btn-primary" >ลบ</button>--}}
                            {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endforeach--}}
{{--@endif--}}

@endsection
