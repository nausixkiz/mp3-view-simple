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
                        <div class="col-md d-flex flex-column align-items-start m-10 justify-content-between align-items-center">
                            <div class="event-ratings"></div>
                            <div class="counter-wrapper mt-1">
                                <strong>Ratings:</strong>
                                <span class="counter" id="{{ $item->id }}"></span>
                                <input id="music-id-{{$item->id}}" type="hidden" name="id" value="{{$item->id}}" readonly>
                            </div>
                        </div>

                        <div class="col-md d-flex flex-column">
                            <marquee class="alert alert-primary" scrolldelay="200">{{$item->title}}      -----  {{$item->title}}</marquee>
                            <marquee behavior="2" direction=""> <p class="card-text" style="font-weight:40px;"></p></marquee>

                            <audio id="my-music-{{$key}}" class="audio-player" controls>
                                <source  src="{{ asset('storage/musics/' .$item->title)}}">
                            </audio>
                        </div>

                        <div class="col-md d-flex justify-content-between align-items-center">
{{--                            <div class="btn-group">--}}
                                <a href="{{route('download', $item->id)}}" type="button" class="btn btn-sm btn-round btn-primary">
                                    <i data-feather='arrow-down-circle'></i> Download
                                </a>
{{--                            </div>--}}
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
    <script src="{{ asset(mix('js/contents/home.js')) }}"></script>
@endsection
