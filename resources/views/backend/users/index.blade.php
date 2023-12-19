@extends('backend.layouts.app')

@section('title',' | Users')

@section('page','Portal Users List Page')

@section('css')

@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
         <div class="d-flex justify-content-between my-3">
            <h4 class="card-title text-primary">Portal Users ({{$count}})</h4>
            <div>
            <a href="{{route('users.create')}}" class="btn btn-sm btn-outline-primary btn-rounded">Add New User</a>
            </div>
         </div>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Username</th>
                  <th>E-mail</th>
                  <th>Phone</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
               @forelse ($data as $user)
                <tr>
                    <td>{{++$i}}.</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone ?? "-"}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                        @if ($user->status)
                        <label class="badge badge-success">Active</label>
                        @else
                        <label class="badge badge-danger">Inactive</label>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('users.edit',$user->id)}}" class="text-primary me-1">Edit</a>
                        <a href="" data-bs-toggle="modal" data-bs-target="#deleteModal{{$user->id}}" class="text-danger delete-btn me-1">Delete</a>
                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('users.destroy',$user->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <div class="modal-body">
                                       <div class="text">Are you sure! You want to delete  this account {{$user->name}}?</div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </td>
                </tr>
               @empty

               @endforelse
              </tbody>
            </table>
          </div>
          {!! $data->appends(request()->input())->links() !!}
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    @if(Session::has('success'))
        toastSuccess('{{ Session::get('success') }}')
    @endif

    @if(Session::has('error'))
        toastError('{{ Session::get('error') }}')
    @endif
</script>
@endsection
