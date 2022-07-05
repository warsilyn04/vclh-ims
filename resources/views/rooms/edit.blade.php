@extends('layout.app')
@section('content')
<div class="container-fluid mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-6  bg-secondary p-5 rounded">
            <form action="/rooms/{{$room->id}}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Room Number</label>
                    <input type="number" name="room_number" value="{{$room->room_number}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Number of Beds</label>
                    <input type="number" name="number_of_beds" value="{{$room->number_of_beds}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <select name="status" class="form-select mb-3" aria-label="Default select example">
                        <option value="1" {{($room->status == 1) ? 'selected':''}} >Active</option>
                        <option value="2" {{($room->status == 0) ? 'selected':''}} >Inactive</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection