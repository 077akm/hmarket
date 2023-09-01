@extends('layouts.app')

@section('content')

    <h2>Результаты скоринга пользователя #{{ $user_id }}</h2>

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Дата</th>
            <th>Скоринг документов</th>
        </tr>
        </thead>
        <tbody>
        @foreach($scoringResults as $result)
            <tr>
                <td>{{ $result->id }}</td>
                <td>{{ $result->created_at }}</td>
                <td>{{ $result->document_score }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
