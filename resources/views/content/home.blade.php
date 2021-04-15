@extends('layouts/contentLayoutMaster')

@section('title', 'Home')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/plyr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/jquery.rateyo.min.css'))}}">
@endsection

@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-media-player.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-ratings.css')) }}">
@endsection

@section('content')
    <div class="row" id="audio-list">
        @foreach ($musics as $key => $item)
            <div class="col-md-3">
                <div class="card mb-4 box-shadow">
                    <div class="card-body">
                        <div class="col-md d-flex flex-column align-items-start m-10">
                            <div class="onChange-event-ratings"></div>
                            <div class="counter-wrapper mt-1">
                                <strong>Ratings:</strong>
                                <span class="counter"></span>
                            </div>
                        </div>
                        <marquee class="alert alert-primary" scrolldelay="200">{{$item->title}}      -----  {{$item->title}}</marquee>
                        <marquee behavior="2" direction=""> <p class="card-text" style="font-weight:40px;"></p></marquee>

                        <audio id="my-music-{{$key}}" class="audio-player" controls controlsList="nofullscreen noremoteplayback">
                            <source  src="{{ asset('storage/musics/' .$item->title)}}">
                        </audio>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button id="playButton" onclick="document.getElementById('myTune{{$key}}').play()" class="btn btn-primary btn-sm btn-round" >
                                    <i data-feather='play-circle'></i>
                                </button>
                                <button id="pauseButton" onclick="document.getElementById('myTune{{$key}}').pause()" class="btn btn-info btn-sm btn-round" >
                                    <i data-feather='pause-circle'></i>
                                </button>

                                <button id="stopButton"  onclick="document.getElementById('myTune{{$key}}').pause(); document.getElementById('myTune{{$key}}').currentTime = 0;" class="btn btn-sm btn-round btn-danger">
                                    <i data-feather='stop-circle'></i>
                                </button>

                                <button onclick="document.getElementById('myTune{{$key}}').volume+=0.1" class="btn btn-warning btn-sm btn-round " type="button" >
                                    <i data-feather='volume-2'></i>
                                </button>

                                <button onclick="document.getElementById('myTune{{$key}}').volume-=0.1" class="btn btn-warning btn-sm btn-round " type="button">
                                    <i data-feather='volume-1'></i>
                                </button>

                                <button onclick="document.getElementById('myTune{{$key}}').muted=!document.getElementById('myTune{{$key}}').muted" type="button" class="btn btn-sm btn-round btn-info">
                                    <i data-feather='volume-x'></i>
                                </button>

                                <a href="{{route('download', $item->id)}}" type="button" class="btn btn-sm btn-round btn-primary">
                                    <i data-feather='arrow-down-circle'></i>Download
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/extensions/plyr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/plyr.polyfilled.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/jquery.rateyo.min.js')) }}"></script>
@endsection

@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/extensions/ext-component-media-player.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/extensions/ext-component-ratings.js')) }}"></script>
@endsection
