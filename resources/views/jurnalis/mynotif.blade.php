@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            @include('layouts.alert')
            <div class="card-header text-center ">
             Notifikasi
            </div>
            <div class="card-body ">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" >
                        <thead>
                            <tr>

                                <th>Poin Berhasil Ditukarkan</th>
                                <th>Nama Bank</th>
                                <th>No Rek</th>
                                <th>Telpon</th>
                                <th>Keterangan</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notif as $a)
                                {{-- @dd($a) --}}
                                <tr>

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

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $notif->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection


