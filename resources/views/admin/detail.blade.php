@extends('layouts.admin.app')

@section('css')
<link href="{{ asset('css/admin/detail.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">詳細</div>
                <div class="card-body">
                    <div class="detail-body">
                        <div class="attendance-body">
@if ($attendanceDetail->attendance)
                            <div class="attendance">出席</div>
@else
                            <div class="absence">欠席</div>
@endif
                        </div>
                        <div class="name">
                            <span class="sei">{{$attendanceDetail->sei}}</span>
                            <span class="mei">{{$attendanceDetail->mei}}</span>
                        </div>
                        <div class="allergie">
                            <div class="allergie-title">アレルギー</div>
                            <div class="allergie-value">@if(is_null($attendanceDetail->allergies))未記入@else{{$attendanceDetail->allergies}}@endif</div>
                        </div>
                        <div class="important-point">
                            <div class="important-point-title">その他</div>
                            <div class="important-point-value">@if(is_null($attendanceDetail->important_point))未記入@else{{$attendanceDetail->important_point}}@endif</div>
                        </div>
                        <div class="message">
                            <div class="message-title">メッセージ</div>
                            <div class="message-value">@if(is_null($attendanceDetail->message))未記入@else{{$attendanceDetail->message}}@endif</div>
                        </div>
                    </div>
                    <div class="return-button">
                        <a href="{{route('admin.index')}}" class="return-link">一覧に戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
