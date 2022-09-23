@extends('layouts.main')

@section('title', '検索画面')

@section('content')
    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
    <h1>郵便番号検索画面</h1>
    <form action="{{ route('customers.create') }}" method="GET">
        @csrf
        <label for="postcode">郵便番号検索</label>
        <input type="text" name="postcode" id="postcode" class="button" placeholder="検索したい郵便番号" value="{{ old('postcode') }}">
        <input type="submit" value="検索" class="button">
    </form>
    <br>
    <div>
        <button type="button" onclick="location.href='{{ route('customers.index') }}'">一覧へ戻る</button>
    </div>

@endsection
