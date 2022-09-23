@extends('layouts.main')

@section('title', '顧客一覧')

@section('content')
    <h1>顧客一覧</h1>
    <table border="2">
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
            @foreach ($customers as $customer)
                <tr>
                    <td>
                        <a href="{{ route('customers.show', $customer->id) }}">
                            {{ $customer->id }}
                        </a>
                    </td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->postcode }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->tel }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <div>
        <button tyepe="button" class="button" onclick="location.href='/customers/check'">新規作成</button>


    </div>
@endsection
