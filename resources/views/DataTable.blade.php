@extends('layout')

@section('title', 'Table')

@section('content')
    <table>
        <thead>
            <tr>
                <th>ФИО</th>
                <th>Почта</th>
                <th>Телефон</th>
                <th>Направление</th>
                <th>Согласие</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($filesData as $file)
                <tr>
                    @foreach ($file as $info)
                        <td>{{ $info }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection