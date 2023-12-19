@extends('backend.layouts.app')

@section('title',' | Password Update')

@section('page','Change User Password Page')

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
                    <h4 class="card-title">Change User Password</h4>
                    <form method="POST" action="{{route('users.update_password',$user->id)}}" class="forms-sample" autocomplete="off" id="submit-form">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                          <label for="password">New Password*</label>
                          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="New Password">
                          @error('password')
                          <div class="text-danger">{{$message}}</div>
                          @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password*</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Confirm Password">
                            @error('password_confirmation')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <button type="button" id="submit-btn" class="btn btn-primary me-2">Update</button>
                        <button type="button" id="loading-btn" class="btn btn-primary me-2">Processing...</button>
                        <a href="{{route('users.index')}}" class="btn btn-light">Cancel</a>
                      </form>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('images/password.png')}}" class="password-img" alt="">
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
