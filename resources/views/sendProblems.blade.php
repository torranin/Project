@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">แจ้งปัญหา</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('sendProblems.save') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">ปัญหาที่พบ</label>
                                <div class="col-md-8">
                                    <input  class="form-control" name="problemsDetail" required autofocus>
                                </div>
                            </div>
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-md-3 control-label">หน่วยงาน</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="groupId">
                                        <option value="">หน่วยงาน</option>
                                        @foreach($group as $index => $item)
                                            <option value="{{$item->id}}">{{$item->groupName}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">ความเร่งด่วน</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="urgency">
                                        <option value="normal">ปกติ</option>
                                        <option value="express">ด่วน</option>
                                        <option value="urgent">ด่วนที่สุด</option>
                                    </select>

                                </div>
                            </div>
                            <center><button type="submit" class="btn btn-primary" >บันทึก</button></center>
                        </form>
                    </div>

                    @if (session()->has('popup'))
                        <center><h3>บันทึกข้อมูลเรีบร้อยแล้ว</h3></center>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
