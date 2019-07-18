@extends('role::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('role.name') !!}
    </p>

    <table>
        <thead>
            <th>
                <td>User</td>
                <td>Role</td>
            </th>
        </thead>
        <tbody>
            @foreach($role as $r)
            <th>
                <td>{{ $r->id }}</td>
                <td>{{ $r->roles }}</td>
            </th>
            @endforeach
        </tbody>
    </table>
    <button onclick="window.location.href = '{{ route('role-create') }}';">Tambah/Edit</button>
@stop
