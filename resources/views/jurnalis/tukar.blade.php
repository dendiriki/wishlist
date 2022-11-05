@extends('layouts.app')

@section('content')


    <div class="container">
       <div class="card mt-5">
        <div class="card-header text-center">
            <h4 class="font-weight-bold">Tukar Poin</h4>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col col-lg-12">
                    <div class="card text-dark bg-light" style="max-width: 100rem;">
                        <div class="card-body">
                          {{-- <h5 class="font-weight-bold">{{ $point->nama_user }} {{ $point->jumlah_point }} Poin</h5> --}}
                          <h5 >Jumlah Poin :</h5>
                          <h3 class="mt-2 font-weight-bold"> {{ $point->jumlah_point }} Poin</h3>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center">
               @foreach ($nominal as $p )
                <div class="col col-lg-3 mb-2">
                     <a class="text text-decoration-none" href="{{ route('limapuluh', ['id' => $point->id]) }}">
                    <div class="card text-dark bg-light" style="max-width: 18rem;">
                        <div class="card-header text-light bg-success">Tukar {{$p->point}} poin</div>
                        <div class="card-body btn-outline-success">
                          <h5 class="card-title">Nominal :</h5>                    
                          <h3 class="mt-2 font-weight-bold"> Rp. {{ $p->nominal }}</h3>
                        </div>
                      </div>
                    </a>
                </div>
                 @endforeach

                 @foreach ($nominal2 as $p )
                 <div class="col col-lg-3 mb-2">
                     <a class="text text-decoration-none" href="{{ route('seratus', ['id' => $point->id]) }}">
                    <div class="card text-dark bg-light" style="max-width: 18rem;">
                        <div class="card-header text-light bg-success">Tukar {{$p->point}} poin</div>
                        <div class="card-body btn-outline-success">
                          <h5 class="card-title">Nominal :</h5>                    
                          <h3 class="mt-2 font-weight-bold"> Rp. {{ $p->nominal }}</h3>
                        </div>
                      </div>
                    </a>
                </div>
                @endforeach

                @foreach ($nominal3 as $p )
                <div class="col col-lg-3 mb-2">
                     <a class="text text-decoration-none" href="{{ route('seratuslimapuluh', ['id' => $point->id]) }}">
                    <div class="card text-dark bg-light" style="max-width: 18rem;">
                        <div class="card-header text-light bg-success">Tukar {{$p->point}} poin</div>
                        <div class="card-body btn-outline-success">
                          <h5 class="card-title">Nominal :</h5>                    
                          <h3 class="mt-2 font-weight-bold"> Rp. {{ $p->nominal }}</h3>
                        </div>
                      </div>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
       </div>
    </div>

@endsection
