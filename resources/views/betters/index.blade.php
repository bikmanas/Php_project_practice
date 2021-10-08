@extends('layouts.app')
@section('content')

<div class="card-body">
    <form class="form-inline" action="{{ route('betters.index') }}" method="GET">
        <select name="horse_id" id="" class="form-control">
            <option value="" selected disabled>Choose a horse to filter:</option>
            @foreach ($horses as $horse)
            <option value="{{ $horse->id }}"
                @if($horse->id == app('request')->input('horse_id'))
                    selected="selected"
                @endif>{{ $horse->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-success" href={{ route('betters.index') }}>Show all</a>
    </form>
</div>

<div class="card-body">
    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Bet</th>
            <th>Horse</th>
            <th>Actions</th>
        </tr>

        @foreach ($betters as $better)
        <tr>
            <td>{{ $better->name }}</td>
            <td>{{ $better->surname }}</td>
            <td>{{ $better->bet }}</td>

            @foreach ($horses as $horse)
                @if($horse->id == $better->horse_id)
                    <td>{{ $horse->name }} </td>
                @endif
            @endforeach

            <td>
                <form action={{ route('betters.destroy', $better->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('betters.edit', $better->id) }}>Edit</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                </form>
            </td>
        </tr>
@endforeach

    </table>
    <div>
        <a href="{{ route('betters.create') }}" class="btn btn-success">Add</a>
    </div>
</div>
@endsection


