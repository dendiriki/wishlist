@extends('layouts.app')

@section('content')

<div class="card-body">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>PUBLISH</th>
                <th>ID USER</th>
                <th>NAMA</th>
                <th>LENCANA</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $leaderboard as $a)
                <tr>
                    <td>{{ $a->rank}}</td>
                    <td>{{ $a->user_id }}</td>
                    <td> @isset($a->user)
                                        {{ $a->user->name }}
                                    @endisset
                                </td>
                    <td>{{ $a->badge }}</td>          
                </tr>
            @endforeach
        </tbody>
    </table>
    
</div>

@endsection

