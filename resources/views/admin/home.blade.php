@extends('layouts.layout')

@section('title', 'Admin - Home')

@section('content')
    <div class="container">
        <h2>Voting Categorys</h2>
        <a href="/admin/category/new" class="btn btn-success">New Category</a>
        {!!
           $categorys->columns(array(
             'name' => 'Name',
             'description' => 'Description',))->addLinkColumn('edit','Edit', '/admin/category/edit/%id')->addLinkColumn('remove','Delete', '/admin/category/remove/%id')
           ->render()
       !!}
    </div>
    <!-- /.container -->
@endsection
@section('javascript')
    <script src="/assets/js/controllers/AdminController.js" type="text/javascript"></script>
@endsection