@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Edit Nominal
            </div>
            <div class="card-body">
                <a href="{{ route('nominal') }}" class="btn btn-primary">Back</a>
                <br />
                <br />

                {{-- @dd($ska) --}}
                <form method="post" action="{{ route('nominal.update', ['id' => $ska->id]) }}">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="text" name="nominal" class="form-control" value="{{ $ska->nominal }}">

                        @if ($errors->has('nominal'))
                            <div class="text-danger">
                                {{ $errors->first('nominal') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
