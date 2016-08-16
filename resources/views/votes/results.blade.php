@extends('layouts.layout')

@section('title', 'Join')

@section('content')
    <div class="container">
        <center>
        {!!
                $votes->columns(array(
                  'name' => 'Mod Name',
                  'authors' => 'Author(s)', 'category1' => 'Category 1 (Original)', 'category2' => 'Category 2 (Visually Pleasing)', 'category3' => 'Category 3 (Useful)', 'total' => 'Total Votes'))
                ->render()
            !!}
        </center>
    </div>
    <!-- /.container -->
@endsection