@extends('layouts.main')

@section('title','新規登録')

@section('content')
    <h1>新規登録画面</h1>
    @if ($errors->any())
        <div class="error">
            <p>
                <b>{{ count($errors) }}件のエラーがあります。</b>
            </p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('customers.store') }}" method="post">
        @csrf
    <p>
        <label for="name">名前</label>
        <input type="text" name="name" id="name" class="list"  value="{{ old('name') }}">
    </p>
    <p>
        <label for="email">メールアドレス</label>
        <input type="text" name="email" id="email" class="list"  value="{{ old('email') }}">
    </p>
    <p>
        <label for="postcode">郵便番号</label>
        <input type="text" name="postcode" id="postcode" class="list"  value="{{ old('postcode', $postcode) }}">
    </p>
    <p>
        <label for="address">住所</label>
        <textarea type="text" name="address" id="address" class="list" >{{ old('address', $address) }}</textarea>

    </p>
    <p>
        <label for="tel">電話番号</label>
        <input type="text" name="tel" id="tel" class="list"  value="{{ old('tel') }}">
    </p>
    
    <input type="submit" value="登録">
    </form>
    <br>
    <button type="button" onclick="location.href='{{ route('customers.check') }}'">郵便番号検索に戻る</button>

@endsection
