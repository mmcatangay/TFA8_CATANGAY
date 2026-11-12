@extends('layouts.app')

@section('content')
<h1>User Accounts</h1>
@if (session('success'))<p>{{ session('success') }}</p>@endif
<a href="{{ route('users.create') }}">Add user</a>
@foreach ($users as $user)
    <p>
        {{ $user->full_name }} ({{ $user->username }})
        <a href="{{ route('users.show', $user) }}">View</a>
        <a href="{{ route('users.edit', $user) }}">Edit</a>
        <form method="POST" action="{{ route('users.destroy', $user) }}" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </p>
@endforeach
@endsection
