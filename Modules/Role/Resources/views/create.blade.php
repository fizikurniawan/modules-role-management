@extends('role::layouts.master')

@section('content')
    <h1>Role Permission</h1>

    <form action="{{ route('role-store') }}" method="POST">
        @csrf
        <div>
            <label for="role">Role</label>
            <select name="role_id">
                @foreach($role as $r)
                <option value="{{ $r->id }}">{{ $r->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="permission"></label>
            <input type="checkbox" name="permission[]" value="create">Create<br>
            <input type="checkbox" name="permission[]" value="edit" checked>Edit<br>
            <input type="checkbox" name="permission[]" value="read" checked>Read<br>
            <input type="checkbox" name="permission[]" value="delete" checked>Delete<br>
        </div>        
        <br>
        <button type="submit">Submit</button>
    </form>
@stop
