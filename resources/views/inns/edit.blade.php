@extends('layout.app')
@section('content')
<div class="container-fluid mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-6  bg-secondary p-5 rounded">
            <form action="/inns/{{$inn->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" value="{{$inn->inn_name}}" name="inn_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Number of Rooms</label>
                    <input type="number" value="{{$inn->number_of_rooms}}" name="number_of_rooms" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Location ID</label>
                    <input type="number" value="{{$inn->location_id}}" name="location_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                
                
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Image</label>
                    <input type="text" value = "{{$inn->room_image}}" name="room_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection