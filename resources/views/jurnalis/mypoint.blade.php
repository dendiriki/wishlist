@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            @include('layouts.alert')
            <div class="card-header text-center ">
                My Poin
            </div>
            <div class="card-body">

                    <div class="row">
                        <div class="col align-self-start">
                            <table>
                                <tr>
                                    <td>
                                        <div class="col-md-4 col-xs-6 ">
                                            <img class="img-responsive" width="50" src="assets/images/point.png" alt="">
                                        </div>
                                    </td>
                                    <td>
                                        @foreach ($pointku as $p)
                                        <h4 class="mt-2 font-weight-bold"> {{ $p->jumlah_point }} Poin</h4>
                                        @endforeach
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col align-self-end">
                            @foreach ($pointku as $point)
                            <a href="{{ route('tukar', ['id' => $point->id]) }}" class="btn btn-outline-success offset-sm-9"><h5 class="mt-2 font-weight-bold">Tukar Poin</h5></a>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <div class="card-header text-center ">
                        Riwayat Poin
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" >
                            <thead>
                                <tr>
                                    <th>Riwayatku</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($riwayat as $r)
                                    {{-- @dd($a) --}}
                                    <tr>
                                        <td>@isset($r)
                                            <h6 class="col-lg-3 mt-3 font-weight-bold "> {{ $r->created_at->format('d, M Y H:i') }}  </h6>
                                            <p class="col-lg-12 mt-2 font-weight-bold ">{{ $r->keterangan }}</p>
                                            <h4 class="col-lg-3 mt-2 font-weight-bold">{{ $r->jumlah_point }} Poin</h4>
                                            @endisset
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $riwayat->links() }}
                    </div>

<!--

                    {{-- @foreach ($pointku as $p)
                    @isset($p)
                    <h6 class="col-lg-3 mt-3 font-weight-bold ">{{ $p->created_at->format('d, M Y H:i') }}  </h6>
                    <h4 class="col-lg-3 mt-2 font-weight-bold">{{ $p->keterangan }}</h4>
                    <h4 class="col-lg-3 mt-2 font-weight-bold">{{ $p->jumlah_point }} Poin</h4>
                    <hr>
                    @endisset --}}


                    {{-- @endforeach --}} -->
            </div>
        </div>
    </div>
@endsection
