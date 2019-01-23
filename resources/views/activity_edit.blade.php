@extends('layouts.app')

@section('content')

    <doactive-edit :data="{{collect($data)}}" :activity="{{collect($active_data)}}" :groups="{{collect($group)}}"></doactive-edit>

@endsection
