@extends('layouts.app')
@section('content')
    <div class="container">
        <p class="h1">Edit Pair</p>
        <form action="{{ route('pairs.update', [$pair->uuid]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label"> Title </label>
                <input name="title" value="{{ $pair->title }}" type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                    aria-describedby="emailHelp">
                @if ($errors->has('title'))
                    <span class="invalid feedback"role="alert">
                        <strong class="text-danger">{{ $errors->first('title') }}.</strong>
                    </span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label"> Cage No </label>
                <input name="cage_no" value="{{ $pair->cage_no }}" type="text" class="form-control {{ $errors->has('cage_no') ? 'is-invalid' : '' }}"
                    aria-describedby="emailHelp">
                @if ($errors->has('cage_no'))
                    <span class="invalid feedback"role="alert">
                        <strong class="text-danger">{{ $errors->first('cage_no') }}.</strong>
                    </span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label"> Male Ring </label>
                <input name="male_ring" value="{{ $pair->male_ring }}" type="text" class="form-control"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label class="form-label"> Female Ring </label>
                <input name="female_ring" value="{{ $pair->female_ring }}" type="text" class="form-control"
                    aria-describedby="emailHelp">
            </div>
            <div class="form-check form-switch">
                <input name="is_sold" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Is Sold</label>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
