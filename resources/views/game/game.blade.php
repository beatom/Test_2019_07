<?php
/**
 * @var \App\Models\Link $link
 */
?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Page A</div>
                    <div class="card-body">
                        <ul>
                            <li><a class="js-copy-url" href="#" onclick="return false;">copy this unique link</a></li>
                            <li><a class="js-edit-link" data-action="new-link" data-link="{{$link->id}}" href="#" onclick="return false;">generate a new unique link</a></li>
                            <li><a class="js-edit-link" data-action="disable-link" data-link="{{$link->id}}" href="#" onclick="return false;">deactivate this unique link</a></li>
                            <li>
                                <button class="btn btn-primary js-game" data-link="{{$link->id}}">Im feeling lucky</button>
                                <button class="btn btn-primary js-game-history" data-link="{{$link->id}}">History</button>
                            </li>
                        </ul>
                    </div>

                    <div id="ajax_response" class="card-body"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
