@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('pairs.create') }}" class="btn btn-primary my-3"> Add New </a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col"> Title </th>
                    <th scope="col"> Cage No </th>
                    <th scope="col"> Male Ring </th>
                    <th scope="col">Female Ring</th>
                    <th scope="col"> Sold</th>
                    <th scope="col"> Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pairs as $pair)
                    <tr>
                        <td scope="col"> {{ $pair->title }} </td>
                        <td> {{ $pair->cage_no }} </td>
                        <td> {{ $pair->male_ring }} </td>
                        <td> {{ $pair->female_ring }} </td>
                        <td> {{ $pair->is_sold ? 'Sold' : '' }} </td>
                        <td>
                            <a href="{{ route('pairs.edit', [$pair->uuid]) }}" class="btn btn-primary btn-sm"> Edit </a>
                            <form style="display: inline-block !important ; "
                                action="{{ route('pairs.destroy', [$pair->uuid]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"> Delete </button>
                            </form>
                            <a href="{{ route('pair.chicks.index', [$pair->uuid]) }}" class="btn btn-primary btn-sm"> Chicks </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            data not found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
