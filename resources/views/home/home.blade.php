@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (!empty($links))
                        <ul>

                            @foreach($links as $link)
                                <li><a href="{{route('game', $link->url)}}">create at {{$link->created_at}}</a></li>
                            @endforeach

                        </ul>

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
