@extends('layouts.layout')

@section('title', 'Competitors')

@section('content')
    <div class="container">
        <h2>Competitor Count: {{ $count }}</h2>
            {!!
                $competitors->columns(array(
                  'username' => 'Username',
                  'competitor_type' => 'Competitor Type',))->addSourceLinkColumn('source', 'Source', "%source")->addStreamLink('stream', 'Stream', "%stream")

                ->render()
            !!}
    </div>
    <!-- /.container -->
@endsection