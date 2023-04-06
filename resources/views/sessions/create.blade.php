@extends('components.layout')
@section('content')

<h5 class="text-center">
    <i class="bi bi-person-plus-fill fs-5 me-2"></i> Log In
</h5>


<form action="/login" method="POST">
    @csrf

    <div class="row">
        <div class="mb-3">
            <div class="form-group">
                <strong>Email Address</strong>
                <input type="email" name="email" class="form-control" placeholder="Email" id="email" value="{{old('email')}}" required>
            </div>
            @error('email')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <div class="form-group">
                <strong>Password</strong>
                <input type="password" name="password" class="form-control" placeholder="Password" id="password" required>
            </div>
            @error('password')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>



        <div class="d-grid gap-2 d-md-block">
            <input type="submit" value="Log In" class="btn btn-dark" />
            <a href="{{ url()->previous()  }}" class="btn btn-primary">Go Back</a>
        </div>
    </div>

</form>
@endsection
