@extends('admin.layout.master')
@section('main')
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Add Admin</h5>
            </div>
            <div class="card-body">
                <form action="{{route('manage.update', $admin->id)}}" method="post">
                    @csrf
                    {!! method_field('PUT') !!}

                    <div class="row">
                        <div class="col-md-6 pr-md-1">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="first_name" value="{{$admin->first_name}}" class="form-control" placeholder="Company" >
                            </div>
                        </div>
                        <div class="col-md-6 pl-md-1">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="last_name"value=" {{$admin->last_name}}" class="form-control" placeholder="Last Name" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{--                        <div class="col-md-6 pr-md-1">--}}
                        {{--                            <div class="form-group">--}}
                        {{--                                <label>User name</label>--}}
                        {{--                                <input type="text" class="form-control" placeholder="MikeRishard">--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <div class="col-md-12 pl-md-1">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email"  value="{{$admin->email}}" class="form-control" placeholder="mike@email.com">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 pr-md-1">
                            <div class="form-group">
                                <label>Role</label>
                                <input type="text" name="role_id" value="{{$admin->role_id}}" class="form-control" placeholder="City" value="Admin">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">edit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    </div>

    </div>
@endsection
