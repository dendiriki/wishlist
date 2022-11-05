@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            @include('layouts.alert')
            <div class="card-header text-center ">
              My Poin
            </div>
            <table class="table table-bordered table-hover table-striped" id="data-tables-mypoin">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id User</th>
                        <th>Poin Berhasil Ditukarkan</th>
                        <th>Nama Bank</th>
                        <th>No Rek</th>
                        <th>Telepon</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notifikasi as $a)
                        {{-- @dd($a) --}}
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                    {{ $a->id_user }}

                            </td>
                            <td>
                                    {{ $a->pesan }}
                                </td>
                            </td>
                            <td>

                                    {{ $a->nama_bank }}

                            </td>

                            <td>

                                    {{ $a->no_rek }}

                            </td>
                            <td>
                                    {{ $a->telpon }}

                            </td>
                            <td>
                                    {{ $a->keterangan }}

                            </td>
                            <td>
                               <a class="btn btn-primary" href="{{ route('konfrim', ['id' => $a->id]) }}">Proses</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $notifikasi->links() }}
        </div>
    </div>
@endsection


