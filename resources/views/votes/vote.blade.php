@extends('layouts.layout')

@section('title', 'Vote')

@section('content')
    <div class="container" ng-controller="VoteController">
        <center>
            <div ng-hide="!showInstructions" class="ngFade">
                <h2>Welcome to voting</h2>
                <h3>To begin, click the button below!</h3>
                <a ng-click="startVoting()" class="btn btn-success">Start</a>
            </div>
            <div class="voting ngFade" ng-hide="!hasStarted">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" ng-model="csrf" ng-initial>
                <h2>Category: {[{categoryName}]}</h2>
                <h3>{[{categoryDesc}]}</h3>
                <h4>Mods:</h4>
                @foreach($mods as $mod)
                    <div class="row">

                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="mod">
                                <img src="{{ $mod->logo }}" class="logo">
                                <div class="text">
                                    <h4>{{ $mod->name }}</h4>
                                    <p>{{ $mod->description }}</p>
                                    <h5>By: {{ $mod->authors }}</h5>
                                </div>
                                <div class="rightButtons">
                                    <button class="btn btn-success btn-responsive" ng-class="voteClass['{{ $mod->id }}']"  ng-model="voteText['{{ $mod->id }}']" ng-click="vote('{{ $mod->id }}')">Vote</button>
                                    <a target="_blank" href="{{$mod->imagesURl}}" class="btn btn-success btn-responsive">Images</a>
                                    @if($mod->url != "")
                                        <a target="_blank" href="{{$mod->url}}" class="btn btn-success btn-responsive">Site</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                @endforeach
            </div>
            <div class="ngFade" ng-hide="!finished">
                <h1>You're done!</h1>
            </div>
        </center>
    </div>
    <!-- /.container -->


@endsection
@section('javascript')
    <script src="/assets/js/controllers/VoteController.js" type="text/javascript"></script>
@endsection