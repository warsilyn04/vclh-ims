@extends('layout.app')
@section('content')

<div class="row d-flex justify-content-center mt-5">
    <div class="col-11 ">
        <div class="bg-secondary rounded h-100 p-4">
            <h1>{{$room->inn->inn_name}}</h1>
            <h2>Room Number: {{$room->room_number}}</h2>
            <h5>Status: {{($room->status == 1) ? 'Active' : 'Inactive'}}</h5>
            <hr class="my-3">
            <h3 class="mb-4">Room Rates</h3>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewRoomRate">
               Add Room Rate
              </button>
            <div class="table-responsive my-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">number of hours</th>
                            <th scope="col">rate</th>
                            <th scope="col">freebie</th>
                            <th scope="col" colspan="2">actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($room_rates) > 0)
                            @foreach ($room_rates as $room_rate)
                            <tr>
                                <td scope="row">{{$room_rate->number_of_hours}}</td>
                                <td scope="row">PHP {{$room_rate->rate}}</td>
                                <td scope="row">{{$room_rate->freebie->freebie}}</td>
                                <td scope="row">
                                    <a href="/room_rates/{{$room_rate->id}}/edit" class="btn btn-success">Edit</a>
                                </td>
                                <td scope="row">
                                    <form action="/room_rates/{{$room_rate->id}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
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
  <div class="modal fade" id="addNewRoomRate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-secondary">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add New Room Rate</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <form action="{{route('room_rates.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Number of Hours</label>
                            <input type="number" name="number_of_hours" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Rate</label>
                            <input type="number" name="rate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <input type="hidden" name="room_id" value="{{$room->id}}">
                        <div class="mb-3">
                            <select name="freebie_id" class="form-select mb-3 w-75 d-inline" aria-label="Default select example">
                                <option value="">Select Freebies</option>
                                @if (count($freebies) > 0)
                                    @foreach ($freebies as $freebie)
                                    <option value="{{$freebie->id}}">with {{$freebie->freebie}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <button type="button" class="btn btn-primary fw-bold float-end" data-bs-toggle="modal" data-bs-target="#addFreebies">
                                +
                            </button>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
   <!-- Modal -->
   <div class="modal fade" id="addFreebies" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-secondary">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add New Freebie</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <form action="{{route('freebies.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" name="freebie" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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