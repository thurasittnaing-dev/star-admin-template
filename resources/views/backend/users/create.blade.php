@extends('backend.layouts.app')

@section('title',' | User Create')

@section('page','Add New Portal User')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between my-3">
                <div>
                    <a href="{{route('users.index')}}" class="btn btn-sm btn-outline-primary btn-rounded">Back to User List</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title">Please Fill Required Information</h4>
                    <form method="POST" action="{{route('users.store')}}" class="forms-sample" autocomplete="off" id="submit-form">
                        @csrf
                        <div class="form-group">
                          <label for="username">Username*</label>
                          <input type="text" name="username" value="{{old('username')}}" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username">
                          @error('username')
                          <div class="text-danger">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="email">Email address*</label>
                          <input type="email" name="email" value="{{old('email')}}"  class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="Email">
                          @error('email')
                          <div class="text-danger">{{$message}}</div>
                          @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" value="{{old('phone')}}"  class="form-control  @error('phone') is-invalid @enderror" id="phone" placeholder="09">
                            @error('phone')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                          </div>

                        <div class="form-group">
                          <label for="password">Password*</label>
                          <input type="password" name="password" value="{{old('password')}}"  class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                          @error('password')
                          <div class="text-danger">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="password_confirmation">Confirm Password*</label>
                          <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
                            placeholder="Password">
                            @error('password_confirmation')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="role">Role *</label>
                            <select name="role" id="role" class="form-control">
                                @forelse (roles() as $role)
                                <option {{old('role') == $role ? "selected" : "" }} {{$role == "service" ? "selected" : "" }} value="{{$role}}">{{$role}}</option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                        <button type="button" id="submit-btn" class="btn btn-primary me-2">Submit</button>
                        <button type="button" id="loading-btn" class="btn btn-primary me-2">Processing...</button>
                        <a href="{{route('users.index')}}" class="btn btn-light">Cancel</a>
                      </form>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('images/users-list.png')}}" class="user-create-img" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
    #loading-btn {
        display: none;
        cursor: not-allowed;
    }
</style>
@endsection

@section('js')
<script>
    $("#submit-btn").on('click',function(){
        $("#submit-btn").hide();
        $('#loading-btn').show()

        $('#submit-form').submit();
    });
</script>
@endsection
