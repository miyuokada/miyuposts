


@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-md-4">
            </aside>
            <div class="col-xs-8">
                @if (count($miyuposts) > 0)
                    @include('miyuposts.miyuposts', ['miyuposts' => $miyuposts])
                @endif
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Miyupostsにようこそ！！<br>たくさん使ってね♡</h1>
              <h1>Miyupostsにようこそ！！<br>たくさん使ってね♡</h1>
            </div>
        </div>
    @endif
@endsection



