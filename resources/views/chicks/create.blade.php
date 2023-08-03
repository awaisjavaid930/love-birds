@extends('layouts.app')
@section('content')
    <div class="container">
        <p class="h1">Add New Chick</p>
        <form action="{{ route('pair.chicks.store', [$id]) }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label"> Title </label>
                <input name="title" value="" type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" aria-describedby="emailHelp">
                @if ($errors->has('title'))
                    <span class="invalid feedback"role="alert">
                        <strong class="text-danger">{{ $errors->first('title') }}.</strong>
                    </span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label"> Cage No </label>
                <input name="cage_no" value="" type="text" class="form-control {{ $errors->has('cage_no') ? 'is-invalid' : '' }}" aria-describedby="emailHelp">
                @if ($errors->has('cage_no'))
                    <span class="invalid feedback"role="alert">
                        <strong class="text-danger">{{ $errors->first('cage_no') }}.</strong>
                    </span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label"> Ring No </label>
                <input name="ring_no" value="" type="text" class="form-control" aria-describedby="emailHelp">
                
            </div>
            <div class="mb-3">
                <label class="form-label"> Date Of Birth </label>
                <input name="dob" value="" type="text" class="form-control {{ $errors->has('dob') ? 'is-invalid' : '' }}" aria-describedby="emailHelp">
                @if ($errors->has('dob'))
                    <span class="invalid feedback"role="alert">
                        <strong class="text-danger">{{ $errors->first('dob') }}.</strong>
                    </span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label"> Gender </label>
                <select name="gender" class="form-select" aria-label="Default select example">
                    <option>Open this select menu</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
