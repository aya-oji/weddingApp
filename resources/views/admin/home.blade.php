@extends('layouts.admin.app')

@section('css')
<link href="{{ asset('css/admin/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">出欠一覧</div>
                <div class="card-body">
                    <div class="cassette-list">
@foreach($attendanceList as $attendance)
                        <a href="{{ route('admin.detail', ['id'=> $attendance->id]) }}">
                            <div class="cassette-body @if($attendance->attendance) attendance @else absence @endif">
                                <div class="name-body">
                                    <span class="sei">{{$attendance->sei}}</span>
                                    <span class="mei">{{$attendance->mei}}</span>
                                </div>
                                <div class="attendance-body">@if($attendance->attendance) 出 席 @else 欠 席 @endif</div>
                            </div>
                        </a>
@endforeach
                    </div>
                    <div class="csv-button">
                        <a href="{{route('admin.putCsv')}}" class="csv-link">一覧を出力する</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
