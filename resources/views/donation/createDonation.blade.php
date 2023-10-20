@extends('master')

@section('content')
<!DOCTYPE html>
<html lang="en">


    <div class="container-fluid my-1 py-1">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12 margin-tb ">

                <div class="card">
                    <div class="card-body" style="text-align: center">
                       <div ><h4> Create Donation </h4></div>

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
        <form action="{{ route('donations.storeDonation') }}" method="POST" enctype="multipart/form-data">
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
                                    <div class="col-sm-3">
                                        <select class="form-select" name="event_id"  value="{{ old('event_id') }}" >
                                         <option value="">Select One</option>
                                         @foreach($events as $event)
                                         <option value={{$event->id}} {{ old('event_id') == $event->id ? 'selected' : '' }}>{{$event->name}}</option>
                                        @endforeach
                                     </select>
                                        @error('event_id')
                                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                       @enderror
                                   </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Donation Date:</label>
                                    <div class="col-sm-3">

                                        <input type="date" class="datepicker" name="donationDate" class="form-control" placeholder="Donation Date" style=" background: #abb7b7;" value="{{ old('donationDate') }}">
                                        @error('donationDate')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label class="col-sm-2 col-form-label">Account Number:</label>
                                    <div class="col-sm-3 py-2">
                                        <input type="text" name="account_number" class="form-control" placeholder="Account Number" style=" background: #abb7b7;" value="{{ old('account_number') }}">
                                        @error('account_number')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Donation Amount:</label>
                                    <div class="col-sm-3 py-2">
                                        <input type="text" name="donation_amount" class="form-control" placeholder="Donation Amount" style=" background: #abb7b7;" value="{{ old('donation_amount') }}">
                                        @error('donation_amount')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label class="col-sm-2 col-form-label">Transaction Number:</label>
                                    <div class="col-sm-3 py-2">
                                        <input type="text" name="transaction_number" class="form-control" placeholder="Transaction Number" style=" background: #abb7b7;" value="{{ old('transaction_number') }}">
                                        @error('transaction_number')
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
