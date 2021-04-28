@extends('admin.layout.master')
@section('main')
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Add Admin</h5>
            </div>
            <div class="card-body">
                <form action="{{route('manage.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 pr-md-1">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control" placeholder="Company" >
                            </div>
                        </div>
                        <div class="col-md-6 pl-md-1">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name" >
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="mike@email.com">
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
                                <input type="text" name="role_id" class="form-control" placeholder="City" value="1">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Admins</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Admin Name
                                </th>
                                <th>
                                    UserName
                                </th>
                                <th>
                                    Email
                                </th>
                                <th class="text-center">
                                    Role
                                </th>
                                <th class="text-center">
                                    Action
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $admin)
                                <tr>
                                    <td>
                                        {{$admin->first_name}}
                                    </td>
                                    <td>
                                        {{$admin->last_name}}
                                    </td>
                                    <td>
                                        {{ $admin->email}}
                                    </td>
                                    <td class="text-center">
                                        {{$admin->role_id}}
                                    </td>
                                    <td class="text-center">

                                        <form method="post" action="{{ route('manage.destroy', $admin->id) }}">
                                        {{ csrf_field() }}
                                           {{ method_field('DELETE') }}
                                        <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon">
                                           <a style="color: white" href="{{ route('manage.edit', $admin->id) }}">
                                               <i class="tim-icons icon-settings"></i>
                                           </a>
                                        </button>
                                        <button type="submit" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon">
                                           <a style="color: white" href="{{ route('manage.destroy', $admin->id) }}">
                                            <i class="tim-icons icon-simple-remove"></i>
                                           </a>
                                        </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
