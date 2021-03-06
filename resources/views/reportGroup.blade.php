@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">ข้อมูลหน่วยงาน</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="text-align: center">ลำดับ</th>
                            <th style="text-align: center">หน่วยงาน</th>
                            <th style="text-align: center">จำนวน</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{ csrf_field() }}
                            @foreach($data as $index => $item)
                                <tr>
                                    <td><center>{{$index+1}}</center></td>
                                    <td>{{$item->groupName}}</td>
                                    <td>{{ $controller->getGroup($item->id) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
                                                                                                                                                                                                                                                                                                                       