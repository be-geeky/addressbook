@extends('layouts.app')
@section('content')
<div class="row">
    <div class=" mt-3">
        <strong>User Profile!</strong>
        <ul class="list-group">
            <li class="list-group-item"><strong>Name</strong>: {{ $user->name  }}</li>
            <li class="list-group-item"><strong>Username</strong>: {{ $user->username  }}</li>
            <li class="list-group-item"><strong>Email</strong>: {{ $user->email  }}</li>
        </ul>
    </div>
</div>
@endsection
