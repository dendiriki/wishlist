@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            @include('layouts.alert')
            <div class="card-header text-center ">
              Nominal Poin
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('nominal.new') }}">

                {{ csrf_field() }}

                <div class="form-group">
                    <label>Nominal</label>
                    <input type="text" name="nominal" class="form-control" placeholder=" Rp.">

                    <label>point</label>
                    <input type="text" name="point" class="form-control" >


                    <label> variabel </label>
                    <select class="form-select form-control" name="variable" aria-label="Default select example">
                    <option selected>pilih variable</option>
                    <option value="1">satu</option>
                    <option value="2">dua</option>
                    <option value="3">tiga</option>
                    <option value="4">empat</option>
                    </select>

                    @if ($errors->has('nominal','point'))
                        <div class="text-danger">
                            {{ $errors->first('nominal','point') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                
                
                </div>



            </form>
            <hr>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>point</th> 
                        <th>Nominal</th>
                        <th>variable</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nominal as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$k->point}}</td>
                            <td>Rp. {{ $k->nominal }}</td>
                            <td>{{$k->variable}}</td>
                            <td>
                                <a href="{{ route('nominal.edit', ['id' => $k->id]) }}"
                                    class="btn btn-warning">Edit</a>
                                <a href="{{ route('nominal.delete', ['id' => $k->id]) }}"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection



