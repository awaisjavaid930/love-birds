@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Chicks List ( {{  $pair->title }} )</h2>
        <a href="{{ route('pair.chicks.create',[$id]) }}" class="btn btn-primary my-3"> Add New </a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col"> Title </th>
                    <th scope="col"> Cage No </th>
                    <th scope="col"> Ring No </th>
                    <th scope="col">Gender</th>
                    <th scope="col"> Sold</th>
                    <th scope="col"> Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($chicks as $chick)
                    <tr>
                        <td scope="col"> {{ $chick->title }} </td>
                        <td> {{ $chick->cage_no }} </td>
                        <td> {{ $chick->ring_no }} </td>
                        <td class="text-capitalize"> {{ $chick->gender }} </td>
                        <td> {{ $chick->is_sold ? 'Sold' : '' }} </td>
                        <td>
                            <a href="{{ route('pair.chicks.edit', [$chick->pair_id,$chick->uuid ]) }}" class="btn btn-primary btn-sm"> Edit </a>
                            <form style="display: inline-block !important ; "
                                action="{{ route('pairs.destroy', [$chick->uuid]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"> Delete </button>
                            </form>
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
