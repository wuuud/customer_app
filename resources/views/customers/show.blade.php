@extends('layouts.main')

@section('title', '顧客情報詳細')

@section('content')
    <h1>顧客情報詳細画面</h1>
    <table border="1">
        <thead>
            <tr>
                <th>顧客ID</th>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>郵便番号</th>
                <th>住所</th>
                <th>電話番号</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->postcode }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->tel }}</td>
            </tr>
        </tbody>
        </table>
        
        <br>
        <button type="button" onclick="location.href='{{ route('customers.edit', $customer) }}'">詳細画面</button>
        <form action="{{ route('customers.destroy', $customer) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" onclick="if(!confirm('削除していいですか?')){return false}">削除する</button>
        </form>
        <button type="button" onclick="location.href='{{ route('customers.index') }}'">一覧に戻る</button>
@endsection
