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
        data-bs-target="#addDepartmentModal">
        Add Department
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="addDepartmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="/createDepartment">
                {{csrf_field()}}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Faculty</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">

                        <input type="text" hidden name="faculty_id" value="{{$faculty->id}}" class="form-control"
                            id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                            placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Head of Department</label>
                        <input type="text" name="hod" class="form-control" id="exampleFormControlInput1" placeholder="">
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
                <th scope="col">Department</th>
                <th scope="col">HOD</th>
                <th scope="col">Actions</th>
            </tr>

        </thead>
        <tbody>
            @foreach($faculty->departments as $department)
            <tr>
                <th scope="row">{{$department->id}}</th>
                <td>{{$department->name}}</td>
                <td>{{$department->hod}}</td>

                <td>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#editBookModal{{$department->id}}"
                        class="btn btn-outline-info">Edit</button>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#deleteBookModal{{$department->id}}"
                        class="btn btn-outline-danger">Delete</button>
                    <div class="modal fade" id="deleteBookModal{{$department->id}}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="/deleteDepartment/{{$department->id}}">
                                    {{csrf_field()}}
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete {{$department->name}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" name="id" value="{{$department->id}}" hidden id="">
                                        Are you sure you want to delete this department
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Proceed to Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection