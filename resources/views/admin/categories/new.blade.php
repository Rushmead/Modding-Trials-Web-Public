@extends('layouts.layout')

@section('title', 'Admin - Home')

@section('content')
    <div class="container" ng-controller="AdminController">
        <div uib-alert ng-repeat="alert in alerts" ng-class="'alert-' + (alert.type || 'warning')" close="closeAlert($index)">{[{alert.msg}]}</div>
        <form ng-submit="createCategory()">
            <label>Name:</label>
            <input type="text" placeholder="Name" class="form-control shortInput" ng-model="newCategory.name">
            <label>Description</label>
            <input type="text" placeholder="Description" class="form-control shortInput" ng-model="newCategory.description">
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
    <!-- /.container -->
@endsection
@section('javascript')
    <script src="/assets/js/controllers/AdminController.js" type="text/javascript"></script>
@endsection