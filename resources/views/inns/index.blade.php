@extends('layout.app')
@section('content')
    <div class="container-fluid mt-3">
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addNewInn">Add New Inn</button>
        <div class="row mt-3">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Inns Table</h6>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Number of Rooms</th>
                                <th scope="col">Location ID</th>
                                <th scope="col" colspan="3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($inns) > 0)
                                @foreach ($inns as $inn)
                                    <tr>
                                        <td>{{$inn->inn_name}}</td>
                                        <td>{{$inn->number_of_rooms}}</td>
                                        <td>{{$inn->location_id}}</td>
                                        <td>
                                            <a href="/inns/{{$inn->id}}" class="btn btn-success">Show</a>
                                            
                                        </td>
                                        <td>
                                            <a href="/inns/{{$inn->id}}/edit" class="btn btn-success">Edit</a>
                                            
                                        </td>
                                        <td>
                                            <form action="/inns/{{$inn->id}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger d-inline">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach                                
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="addNewInn" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-secondary">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add New Inn</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <form action="{{route('inns.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" name="inn_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Number of Rooms</label>
                            <input type="number" name="number_of_rooms" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Location ID</label>
                            <input type="number" name="location_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                     
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Image</label>
                            <input type="file" name="room_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection