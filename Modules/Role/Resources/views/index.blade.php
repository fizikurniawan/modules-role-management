@extends('role::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('role.name') !!}
    </p>

    <table border="1px">
        <thead>
            <th>
                <td>Role</td>
                <td>Permission</td>
            </th>
        </thead>
        <tbody>
            @foreach($role as $r)
            <th>
                <td>{{ $r->name }}</td>
                <td>
                    @foreach($r->permissions as $p)
                        {{ $p->permission }} ,
                    @endforeach
                </td>
            </th>
            @endforeach
        </tbody>
    </table>
    <button onclick="window.location.href = '{{ route('role-create') }}';">Tambah/Edit</button>
@stop
