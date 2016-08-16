@extends('layouts.layout')

@section('title', 'Admin - Home')

@section('content')
    <div class="container" ng-controller="AdminController">
        <div uib-alert ng-repeat="alert in alerts" ng-class="'alert-' + (alert.type || 'warning')" close="closeAlert($index)">{[{alert.msg}]}</div>
        <form ng-submit="saveCategorySubmit()">
            <input type="text" value="{{ $category->id }}" hidden ng-model="saveCategory.id" ng-initial>
            <label>Name:</label>
            <input type="text" value="{{ $category->name }}" class="form-control shortInput" ng-model="saveCategory.name"  ng-initial>
            <label>Description</label>
            <input type="text" placeholder="Description" value="{{ $category->description }}" class="form-control shortInput" ng-model="saveCategory.description" ng-initial>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
    <!-- /.container -->
@endsection
@section('javascript')
    <script src="/assets/js/controllers/AdminController.js" type="text/javascript"></script>
@endsection