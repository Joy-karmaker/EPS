@extends('master')

@section('content')
<!DOCTYPE html>
<html lang="en">


    <div class="container-fluid my-1 py-1">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12 margin-tb ">

                <div class="card">
                    <div class="card-body" style="text-align: center">
                       <div ><h4> Create Event </h4></div>

                    </div>
                  </div>

            </div>
        </div>
    </div>
            @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
            @endif
        <form action="{{ route('events.storeEvent') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="container-fluid my-2 py-2">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-12 margin-tb ">
                        <div class="card my-2 ">
                            <div class="card-body" style="text-align: center">

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Programme Name:</label>
                                    <div class="col-sm-3">
                                        <select class="form-select" name="program_id"  value="{{ old('program_id') }}" >
                                         <option value="">Select One</option>
                                         @foreach($programs as $program)
                                         <option value={{$program->id}} {{ old('program_id') == $program->id ? 'selected' : '' }}>{{$program->name}}</option>
                                        @endforeach
                                     </select>
                                        @error('program_id')
                                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                       @enderror
                                   </div>
                                    <label class="col-sm-2 col-form-label">Event Name:</label>
                                    <div class="col-sm-3 ">
                                        <input type="text" name="eventName" class="form-control" placeholder="Event Name" style=" background: #abb7b7;" value="{{ old('name') }}">
                                        @error('name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Event Date:</label>
                                    <div class="col-sm-3">

                                        <input type="date" class="datepicker" name="eventDate" class="form-control" placeholder="Event Date" style=" background: #abb7b7;" value="{{ old('eventDate') }}">
                                        @error('eventDate')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label class="col-sm-2 col-form-label">Event Start Date:</label>
                                    <div class="col-sm-3 ">
                                        <input type="date" class="datepicker" name="eventStartDate" class="form-control" placeholder="Event Start Date" style=" background: #abb7b7;" value="{{ old('eventStartDate') }}">
                                        @error('eventStartDate')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Event Close Date:</label>
                                    <div class="col-sm-3">
                                        <input type="date" class="datepicker" name="eventCloseDate" class="form-control" placeholder="Event Close Date" style=" background: #abb7b7;" value="{{ old('eventCloseDate') }}">
                                        @error('eventCloseDate')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label style= "display:none" class="col-sm-2 col-form-label">Event organizer:</label>
                                    <div style= "display:none" class="col-sm-3">
                                        <select class="form-select" name="user_id"  value="{{ old('user_id') }}" >
                                         <option value="">Select One</option>
                                         @foreach($users as $user)
                                         <option value={{$program->id}} {{ old('user_id') == $user->id ? 'selected' : '' }}>{{$user->name}}</option>
                                        @endforeach
                                     </select>
                                        @error('user_id')
                                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                       @enderror
                                   </div>
                                </div>
                                <div class="form-group row">
                                </div>
                                <div class="form-group my-2 row">
                                    <div class="col-sm-4">
                                    </div>

                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-primary ml-3">Submit</button>


                                        </div>
                                    </div>

                        </div>
                    </div>
                </div>
            </div>

        </form>


<script src="../admin/js/core/popper.min.js"></script>
<script src="../admin/js/core/bootstrap.min.js"></script>
<script src="../admin/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../admin/js/plugins/smooth-scrollbar.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>


@endsection
