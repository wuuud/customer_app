@extends('layouts.main')

@section('title', '編集画面')

@section('content')
    <h1>編集画面</h1>
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
    <form action="{{ route('customers.update', $customer) }}" method="post">
        @csrf
        @method('PATCH')
    <p>
        <label for="name">名前</label>
        <input type="text" name="name" id="name" class="list" value={{ old('name', $customer->name) }}>
    </p>
    <p>
        <label for="email">メールアドレス</label>
        <input type="text" name="email" id="email" class="list" value={{ old('email', $customer->email) }}>
    </p>
    <p>
        <label for="postcode">郵便番号</label>
        <input type="postcode" name="postcode" id="postcode" class="list"  value={{ old('postcode', $customer->postcode) }}>
    </p>
    <p>
        <label for="address">住所</label>
        <input type="address" name="address" id="address" class="list"  value={{ old('address', $customer->address) }}>
    </p>
    <p>
        <label for="tel">電話番号</label>
        <input type="text" name="tel" id="tel" class="list"  value={{ old('tel', $customer->tel) }}>
    </p>
    <input type="submit" class="submit" value="更新">
    </form>

    <p>
        <button type="submit" onclick="location.href='{{ route('customers.index') }}'">戻る</button>
    </p>
@endsection
