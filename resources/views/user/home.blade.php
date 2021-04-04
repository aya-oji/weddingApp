@extends('layouts.user.app')

@section('css')
    <link href="{{ asset('css/user/home.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class='main'>
{{-- TODO: register後だけ表示する。 --}}
@if(isset($registerMessage))
    <div class='complete-message'>出欠登録が完了しました。回答ありがとうございました。</div>
@endif
    <section class='contents-main'>
        <div class='greeting-message'>
            <div class="greeting-message-title">新郎・新婦からのご挨拶</div>
            <div class="greeting-message-content">新郎新婦からの挨拶を表示するエリア</div>
        </div>
        <div class='info'>
            <div class='date'>
                <div class='date-title'>日程</div>
                <div class='date-content'>日程を表示するエリア</div>
            </div>
            <div class='location'>
                <div class='location-title'>会場</div>
                <div class='location-content'>会場名を表示するエリア</div>
                <div class='location-link'>
                    <a href='#'>式会場HP</a>
                    <span class='location-annotation'>※外部サイトへ遷移します。</span>
                </div>
            </div>
            <div class='access'>
                <div class='access-title'>アクセス</div>
                <div class='access-link'>
                    <a href='#'>アクセスはこちら</a>
                    <span class='access-annotation'>※外部サイトへ遷移します。</span>
                </div>
            </div>
            <div class='deadline'>
                <div class='deadline-title'>回答期限</div>
                <div class='deadline-content'>回答期限を表示するエリア</div>
            </div>
        </div>
@if ($errors->any())
        <div class='errors'>
            <ul>
@foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
@endforeach
            </ul>
        </div>
@endif
        <div class='form'>
            <form action="{{ route('user.attendanceRegister') }}" method='POST'>
                <div class='attendance'>
                    <input type='radio' name='attendance' value=’1’ id='attendance'><label for='attendance'>出席</label>
                    <input type='radio' name='attendance' value=’0’ id='absence'><label for='absence'>欠席</label>
                </div>
                <div class='allergie'>
                    <div class='allergie-title'><lavel for='allergie'>アレルギー</lavel></div>
                    <input type='text' name='allergie' id='allergie' placeholder='乳製品、ナッツ' value=''>
                </div>
                <div class='information'>
                    <div class='information-title'><lavel for='information'>その他、伝えておきたい注意点</lavel></div>
                    <textarea name='information' id='information'　placeholder='例）アレルギーではないですが、〇〇が苦手です。'></textarea>
                </div>
                <div class='message'>
                    <div class='message-title'><lavel for='message'>新郎新婦へのメッセージ</lavel></div>
                    <textarea name='message' id='message'　placeholder='例）ご結婚おめでとうございます！'></textarea>
                </div>
                {{ csrf_field() }}
                <div class='btn-success'>
                    <button class="btn">回答を登録する</button>
                </div>
            </form>
        </div>
    </section>
</dev>
@endsection
