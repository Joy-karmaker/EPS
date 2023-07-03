<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Company Form - Laravel 9 CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Admin</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('admins.index') }}"> Back</a>

                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('admins.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Full Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Full Name">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    @error('email')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" name="password" class="form-control" placeholder=" Password">
                    @error('password')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-select">
                    <strong>Country</strong><br>
                    <select class="form-select" name="country_id">
                        <option value="">Select One</option>
                        @foreach($countries as $country)
                     <option value={{$country->id}}>{{$country->name}}</option>
                    @endforeach
                    </select>
                    @error('country_id')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>City:</strong>
                        <textarea name="city" class="form-control" placeholder="City"> </textarea>

                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Street:</strong>
                        <textarea name="street" class="form-control" placeholder="Street/Road"> </textarea>

                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Address:</strong>
                        <textarea name="address" class="form-control" placeholder="Address"> </textarea>
                        @error('address')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Phone:</strong>
                        <input type="text" name="phone_no" class="form-control" placeholder="Phone Number">
                        @error('phone_no')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Image:</strong>
                        <input type="file" name="image" class="form-control"/>



                    </div>
                </div>

                {{-- <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control"/>

                    <img src="" alt="image" />
                </div> --}}
            {{-- <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-select">
                    <strong>Program Name</strong><br>
                    <select class="form-select" name="program_id">
                        <option value="0">Select One</option>
                        @foreach($programs as $program)
                     <option value={{$program->id}}>{{$program->name}}</option>
                    @endforeach
                    </select>
                </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-select">
                        <strong>Event Name</strong><br>
                        <select class="form-select" name="event_id">
                            <option value="0">Select One Event</option>
                            @foreach($events as $event)
                         <option value={{$event->id}}>{{$event->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    </div> --}}

                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>

</body>

</html>
