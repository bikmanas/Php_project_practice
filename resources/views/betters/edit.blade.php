@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change betters information:</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('betters.update', $better->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label>Name: </label>
                            <input type="text" name="name" class="form-control" value="{{ $better->name }}">
                        </div>
                        <div class="form-group">
                            <label>Surname: </label>
                            <input type="text" name="surname" class="form-control" value="{{ $better->surname }}">
                        </div>
                        <div class="form-group">
                            <label>Bet: </label>
                            <input type="number" name="bet" class="form-control" value="{{ $better->bet }}">
                        </div>
                        <div class="form-group">
                            {{-- <label>Keliaus į: </label> --}}
                            <select name="horse_id" id="" class="form-control">
                                 <option value="" selected disabled>Choose a horse:</option>
                                 @foreach ($horses as $horse)
                                <option value="{{ $horse->id }}" @if($horse->id == $better->horse_id) selected="selected" @endif>{{ $horse->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Change</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
