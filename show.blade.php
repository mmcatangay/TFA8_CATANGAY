@extends('layouts.app')

@section('content')
<h1>User Account Details</h1>
<p><strong>Username:</strong> {{ $user->username }}</p>
<p><strong>Name:</strong> {{ $user->full_name }}</p>
<a href="{{ route('users.edit', $user) }}">Edit</a>
<a href="{{ route('users.index') }}">Back</a>
@endsection
