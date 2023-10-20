@extends('master')

@section('content')

<div class="card card-body ">
    <div class="col-md-10 " style="text-align: center">
        <h4 class="mb-0">All Event Information</h4>
      </div>
    </div>
    <br>

        <button type="button" class="btn btn-outline-success"> <a href="{{ URL::to(route('events.createEvent'))}}">Create Event </a></button>


      <table  style="width:100%" class="table table-striped table-bordered">
        <thead>
            <tr align="left">
                <th style="width:10%">Programme Name</th>
                <th style="width:10%">Event Name</th>
                <th style="width:10%">Event Date</th>
                <th style="width:10%">Donation Start Date</th>
                <th style="width:10%">Donation Close Date</th>
                <th style="width:10%">Event organizer</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $key=>$row)
            <tr align="left">
                <td>{{$row->programme_name}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->eventDate}}</td>
                <td>{{$row->donationStartDate}}</td>
                <td>{{$row->donationClosingDate}}</td>
                <td>{{$row->user_id}}</td>


                {{-- <td>
                  <a href="{{ URL::to(route('events.editEvent',['id' => $row->id]))}}">
                        <i class="fa-solid fa-bars" title="Edit Event"></i>
                      </a>

                    <a href="{{ URL::to(route('events.deleteEvent',['id' => $row->id]))}}">
                        <i class="fa fa-trash text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Event"></i>
                      </a>

                </td> --}}

            </tr>

            @endforeach
        </tbody>
        </table>


@endsection
