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
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Department</th>
                <th scope="col">Faculty</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <th scope="row">{{$student->user->id}}</th>
                <td>{{$student->user->name}}</td>
                <td>
                    {{$student->department->name ?? "Unassigned Department"}}
                </td>
                <td><button type="button" data-bs-toggle="modal" data-bs-target="#editStudentModal{{$student->id}}"
                        class="btn btn-outline-info">Edit</button></td>
            </tr>
            <div class="modal fade" id="editStudentModal{{$student->id}}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="/students/edit">
                            {{csrf_field()}}
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit {{$student->user->name}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <input type="text" name="id" value="{{$student->id}}" hidden class="form-control"
                                        id="exampleFormControlInput1" placeholder="">
                                </div>
                                <select required name="department_id" class="form-select form-select"
                                    aria-label=".form-select example">
                                    <option selected disabled>Select Department</option>
                                    @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection