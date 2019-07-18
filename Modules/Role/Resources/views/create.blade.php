@extends('role::layouts.master')

@section('content')
    <h1>Create User Role</h1>

    <form action="{{ route('role-store') }}" method="POST">
        @csrf
        <select name="user_id">
            @foreach(\App\User::all() as $u)
            <option value="{{ $u->id }}">{{ $u->name }}</option>
            @endforeach
        </select>
        <select name="role">
            <option value="admin">Admin</option>
            <option value="manager">Manager</option>
            <option value="cs">CS</option>
        </select>
        
        <br>
        <button type="submit">Submit</button>
    </form>
@stop
