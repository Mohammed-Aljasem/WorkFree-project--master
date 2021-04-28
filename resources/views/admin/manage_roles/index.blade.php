@extends('admin.layout.master')
@section('main')
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Add Role</h5>
            </div>
            <div class="card-body">
                <form action="{{route('roles.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Role</label>
                                <input type="text" name="role_name" class="form-control" placeholder="admin">
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
                <h4 class="card-title">Roles</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Role id
                                </th>
                                <th>
                                    Role name
                                </th>
                                <th class="text-center">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($roles))
                                @foreach($roles as $role)
                                    <tr>
                                        <td>
                                            {{$role->id}}
                                        </td >
                                        <td>
                                            {{$role->role_name}}
                                        </td>
                                        <td class="text-center">
                                            <form method="post" action="{{ route('roles.destroy', $role->id) }}">
                                            {{ csrf_field() }}
                                               {{ method_field('DELETE') }}
                                            <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon">
                                               <a style="color: white" href="{{ route('roles.edit', $role->id) }}">
                                                   <i class="tim-icons icon-settings"></i>
                                               </a>
                                            </button>
                                            <button type="submit" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon">
                                               <a style="color: white" href="{{ route('roles.destroy', $role->id) }}">
                                                <i class="tim-icons icon-simple-remove"></i>
                                               </a>
                                            </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
