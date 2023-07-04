<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Admin Form - Laravel 9 CRUD Tutorial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Admin</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('admins.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('admins.update',$admin->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Admin Name:</strong>
                        <input type="text" name="name" value="{{ $admin->name }}" class="form-control"
                            placeholder="Admin name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Admin Email:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Admin Email"
                            value="{{ $admin->email }}">
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Password:</strong>
                        <input type="password" name="password" class="form-control" placeholder="Admin Name"  value="{{ $admin->password
                         }}">

                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-select">
                        <strong>Country</strong><br>
                        <select class="form-select" name="country_id">

                            @foreach($countries as $country)
                         <option value={{$country->id}}>{{$country->name}}</option>
                        @endforeach
                        </select>

                    </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>City:</strong>
                            <textarea name="city" class="form-control" placeholder="City"   value="">{{ $admin->city }} </textarea>

                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Street:</strong>
                            <textarea name="street" class="form-control" placeholder="Street/Road"
                            value="">{{ $admin->street
                            }} </textarea>

                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Address:</strong>
                            <textarea name="address" class="form-control" placeholder="Address"  value=""> {{ $admin->address
                            }}</textarea>

                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Phone:</strong>
                            <input type="text" name="phone_no" class="form-control" placeholder="Phone Number"  value="{{ $admin->phone_no
                            }}">

                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Image:</strong>
                            <input type="file" name="image" class="form-control" >
                            <input type="hidden" name="existing_image" class="form-control" value ={{ $admin->image }}>
                            <div style>
                                @if ($admin->image!='')
                                <img src="/Image/{{ $admin->image }}" alt="profile_image" >

                                @else
                                <img src="/Image/demoProfile.jpg" alt="profile_image" height="5%" width="15%">
                                @endif

                            </div>
                        </div>
                    </div>

                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
