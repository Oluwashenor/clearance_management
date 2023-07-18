@extends('layouts.layout')

<style>
    .body-div {
        background-color: white !important;
        padding: 5%;
        max-width: 80%;
        border-radius: 3%;
        margin-left: 13%;
        margin-top: 3%;
    }
</style>


@section('content')

<div class="body-div">
    <h1 class="display-6"> {{Auth::user()->name}}</h1>
    <h1 class="display-6" style="font-size: small;"> {{$user->student->department->name}}</h1>
    <hr>
    <h5>Departments to be Cleared </h5>
    <dl class="row">
        <?php
        $counter = 1;
        ?>
        @foreach($user->clearances as $cl)
        <dt class="col-sm-1">{{$counter++}}.</dt>
        <dt class="col-sm-3">{{$cl->name}}</dt>
        <dd class="col-sm-8">
            <p>{{$cl->checked ? "Cleared✔" : "Pending"}}</p>
        </dd>
        @endforeach
        <blockquote class="blockquote">
            <p>{{$user->cleared ? "Your Cleareance is Complete, Congrats" : "You have $user->clearancePending clearance pending"}}.
            </p>
        </blockquote>

    </dl>

</div>

@endsection