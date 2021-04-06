@extends('layouts/contentLayoutMaster')

@section('title', 'Create New Music')

@section('content')
    <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create New Music Form</h4>
            </div>
            <div class="card-body">
                @if(isset($errors))
                    @foreach($errors->all() as $error)
                            <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                <div class="alert-body">
                                    <i data-feather="info" class="mr-50 align-middle"></i>
                                    <span>{{$error}}</span>
                                </div>
                            </div>
                    @endforeach
                @endif
                <form class="form form-horizontal" method="POST" action="{{route('music.store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label">
                                    <label for="contact-info">Music</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" name="music" class="custom-file-input" id="customFile" accept=".mp3,audio/*"/>
                                        <label class="custom-file-label" for="customFile">Choose your music</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn btn-primary mr-1">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
