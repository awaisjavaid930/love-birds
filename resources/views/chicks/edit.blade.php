@extends('layouts.app')
@section('content')
    <div class="container">
        <p class="h1">Edit Pair</p>
        <form action="{{ route('pair.chicks.update', [$chick->pair_id,$chick->uuid ]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label"> Title </label>
                <input name="title" value="{{ $chick->title }}" type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                    aria-describedby="emailHelp">
                @if ($errors->has('title'))
                    <span class="invalid feedback"role="alert">
                        <strong class="text-danger">{{ $errors->first('title') }}.</strong>
                    </span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label"> Cage No </label>
                <input name="cage_no" value="{{ $chick->cage_no }}" type="text" class="form-control {{ $errors->has('cage_no') ? 'is-invalid' : '' }}"
                    aria-describedby="emailHelp">
                @if ($errors->has('cage_no'))
                    <span class="invalid feedback"role="alert">
                        <strong class="text-danger">{{ $errors->first('cage_no') }}.</strong>
                    </span>
                @endif
            </div>
               <div class="mb-3">
                <label class="form-label"> Ring No </label>
                <input name="ring_no" value="{{ $chick->ring_no }} " type="text" class="form-control" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label class="form-label"> Date Of Birth </label>
                <input name="dob" value="{{ $chick->dob }} " type="text" class="form-control {{ $errors->has('dob') ? 'is-invalid' : '' }}" aria-describedby="emailHelp">
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
                    <option value="male" {{ $chick->gender == 'male' ? 'selected' : ''  }}>Male</option>
                    <option value="female" {{ $chick->gender == 'female' ? 'selected' : ''  }}>Female</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
