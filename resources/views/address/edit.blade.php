@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Address</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('addresses.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="row">
            <div class="alert alert-danger mt-3">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="row">
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        </div>
    @endif
    <form action="{{ route('addresses.update',$address->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" value="{{$address->title}}" required/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Address Line 1:</label>
                    <input type="text" name="address_line_1" class="form-control" value="{{$address->address_line_1}}" required/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Address Line 2:</label>
                    <input type="text" name="address_line_2" class="form-control" value="{{$address->address_line_2}}" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Pin Code:</label>
                    <input type="text" name="pincode" class="form-control" value="{{$address->pincode}}" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>City:</label>
                    <input type="text" name="city" class="form-control" value="{{$address->city}}" required/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>State:</label>
                    <input type="text" name="state" class="form-control" value="{{$address->state}}" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Country:</label>
                    <select class="form-control" name="country" required>
                        <option value="">--Select Country--</option>
                        @foreach ($countries as $id => $name)
                            <option value="{{ $name }}" {{ $name == $address->country ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="type">Type:</label>
                    <select class="form-control" name="type" required>
                        <option value="">--Select Type--</option>
                        @foreach ($types as $key => $value)
                            <option value="{{ $key }}" {{ $key == $address->type ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
