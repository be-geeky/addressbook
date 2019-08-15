@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 5.8 </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('addresses.create') }}"> Create New Address</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Title</th>
            <th>Address Line 1</th>
            <th>Address Line 2</th>
            <th>City, State, Country</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($addresses as $address)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $address->contact->name }}</td>
                <td>{{ $address->contact->phone }}</td>
                <td>{{ $address->title }}</td>
                <td>{{ $address->address_line_1 }}</td>
                <td>{{ $address->address_line_2 }}</td>
                <td>{{ $address->city }}, {{ $address->state }}, {{ $address->country }}</td>
                <td>
                    <form action="{{ route('addresses.destroy',$address->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('addresses.edit',$address->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $addresses->links() !!}
@endsection
