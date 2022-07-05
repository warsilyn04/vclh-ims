@extends('layout.app')
@section('content')
<div class="container-fluid mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-6  bg-secondary p-5 rounded">
            <form action="/room_rates/{{$room_rate->id}}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Number of Hours</label>
                    <input type="number" value="{{$room_rate->number_of_hours}}" name="number_of_hours" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Rate</label>
                    <input type="number" value="{{$room_rate->rate}}" name="rate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <input type="hidden" name="room_id" value="{{$room_rate->room_id}}">
                <div class="mb-3">
                    <select name="freebie_id" class="form-select mb-3 w-75 d-inline" aria-label="Default select example">
                        <option value="">Select Freebies</option>
                        @if (count($freebies) > 0)
                            @foreach ($freebies as $freebie)
                            <option value="{{$freebie->id}}" {{($room_rate->freebie_id == $freebie->id) ? 'selected' : ''}}>with {{$freebie->freebie}}</option>
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
@endsection