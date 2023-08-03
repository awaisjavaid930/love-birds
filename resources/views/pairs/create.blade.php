@extends('layouts.app')
@section('content')
    <div class="container">
        <p class="h1">Add Pair</p>
        <form action="{{ route('pairs.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label"> Title </label>
                <input name="title" value="" type="text"
                    class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" aria-describedby="emailHelp">
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
                <label class="form-label"> Male Ring </label>
                <input name="male_ring" value="" type="text" class="form-control" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label class="form-label"> Female Ring </label>
                <input name="female_ring" value="" type="text" class="form-control" aria-describedby="emailHelp">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
