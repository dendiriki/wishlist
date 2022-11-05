@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">



<form form method="post" action="{{ route('seratus.kirim', ['id' => $point->id]) }}">

  {{ csrf_field() }}
  {{ method_field('PUT') }}

    <div class="mb-3">
      <label for="nama_user" class="form-label">Nama User</label>
      <input type="text"  class="form-control" id="nama_user" name="nama_user" readonly value="{{ $point->nama_user }}">
    </div>

    <div class="mb-3">
        <label for="nama_bank" class="form-label">Masukkan Nama Bank</label>
        <input type="text" class="form-control" id="nama_bank" name="nama_bank">
      </div>

      <div class="mb-3">
        <label for="no_rek" class="form-label">Masukkan No Rekening</label>
        <input type="text" class="form-control" id="no_rek" name="no_rek">
      </div>

      <div class="mb-3">
        <label for="telpon" class="form-label">Masukkan No Telpon</label>
        <input type="text" class="form-control" id="telpon" name="telpon">
      </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

</div>
</div>
</div>

@endsection
