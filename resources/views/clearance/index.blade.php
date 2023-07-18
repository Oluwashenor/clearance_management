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

<!-- Button trigger modal -->
<div class="row"
    style="display:flex;justify-content:space-between;margin-top:1%;height:50px;margin-left:20px;width:95%;">
    <button style="width: 150px;" type="button" class="btn btn-primary" data-bs-toggle="modal"
        data-bs-target="#addFacultyModal">
        Add Module
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="addFacultyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="/clearance-module/create">
                {{csrf_field()}}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add clearance Module</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                            placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="body-div">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($modules as $module)
            <tr>
                <th scope="row">{{$module->id}}</th>
                <td>{{$module->name}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection