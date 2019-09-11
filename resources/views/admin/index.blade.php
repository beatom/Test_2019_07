<?php
/**
 * @var array $users
 */
?>
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">users</div>
                    <div class="card-body">
                        <a href="{{ URL::route('admin.edit',0) }}" class="btn btn-primary">create user</a>
                        <table class="table">
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>phone</th>
                                <th>created_at</th>
                                <th></th>
                            </tr>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>
                                        <a class="trashButton" href="{{ URL::route('admin.destroy',$user->id) }}">delete</a>
                                        <br><a class="trashButton" href="{{ URL::route('admin.edit',$user->id) }}">edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                    <div id="ajax_response" class="card-body"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
