@extends('layouts.wishlist')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        blockquote {
            background: #f9f9f9;
            border-left: 10px solid #ccc;
            margin: 1.5em 10px;
            padding: 0.5em 10px;
            quotes: "\201C""\201D""\2018""\2019";
        }
        blockquote:before {
            color: #ccc;
            content: open-quote;
            font-size: 4em;
            line-height: 0.1em;
            margin-right: 0.25em;
            vertical-align: -0.4em;
        }
        blockquote p {
            display: inline;
            font-style: italic;
        }
        blockquote h6 {
            font-weight: 700;
            padding: 0;
            margin: 0 0 .25rem;
        }
        .child-comment {
            padding-left: 50px;
        }
    </style>
    
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">{{ $artikel->judul }}</h3>
                <p class="text-center mb-0" style="font-size: 0.8rem">{{ $artikel->artikelstatus[0]->updated_at }}</p>
                <p class="text-center" style="font-size: 0.8rem">By {{ $artikel->user->name }}</p>
                <img style="width:650px; height:400px ; margin-left:230px; object-fit: cover" class="text-center mb-3"
                    style="max-width: 100%" src="{{ asset('uploads/' . $artikel->thumb) }}" />
                {!! $artikel->isi !!}

            </div>
        </div>
    </div>

                <br><br>
                        
                        <div class="container">
                            <h5>Komentar</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ url('/commant') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $artikel->id }}" class="form-control">
                                    <input type="hidden" name="parent_id" id="parent_id" class="form-control">
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="text" class="form-control" name="username">
                                        <p class="text-danger">{{ $errors->first('username') }}</p>
                                    </div>
                                    <div class="form-group" style="display: none" id="formReplyCommant">
                                        <label for="">Balas Komentar</label>
                                        <input type="text" id="replyCommant" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Komentar</label>
                                        <textarea name="commant" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                    <button class="btn btn-primary btn-sm">Kirim</button>
                                </form>
                            </div>
                            

                          
                            <div class="col-md-6">
                                @foreach ($artikel->commants as $row)
                                    <blockquote>
                                        <h6>{{ $row->username }}</h6>
                                        <hr>
                                        <p>{{ $row->commant }}</p><br>
                                        <a href="javascript:void(0)" onclick="balasKomentar( {{ $row->id }}, '{{ $row->commant }}')">Balas</a>
                                    </blockquote>
                                    @foreach ($row->child as $val) 
                                        <div class="child-commant">
                                            <blockquote>
                                                <h6>{{ $val->username }}</h6>
                                                <hr>
                                                <p>{{ $val->commant }}</p><br>
                                            </blockquote>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        </div>
                    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        function balasKomentar(id, title) {
            $('#formReplyCommant').show();
            $('#parent_id').val(id)
            $('#replyCommant').val(title)
        }
    </script>
@endsection
