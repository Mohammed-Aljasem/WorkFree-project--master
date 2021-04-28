@extends('admin.layout.master')
@section('main')
    <div class="col-md-12">
        <div class="card">
            <table class="table">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Email</th>
                    <th class="text-right">Salary</th>
                    <th class="text-right">Actions</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    @foreach($users as $user)
                    <td class="text-center">{{$user->id}}</td>
                    <td>{{$user->first_name}}-{{$user->last_name}}</td>
                    <td>{{$user->id}}</td>
                    <td>{{$user->email}}</td>
                    <td class="text-right">&euro; 89,241</td>
                    <td class="td-actions text-right">

                        <form method="post" action="{{ route('users.destroy', $user->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="button" rel="tooltip" class="btn btn-info btn-sm btn-round btn-icon">
                                <a style="color: white" href="">
                                <i class="tim-icons icon-single-02"></i>
                                </a>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon">
                                <a style="color: white" href="{{ route('users.edit', $user->id) }}">
                                    <i class="tim-icons icon-settings"></i>
                                </a>
                            </button>
                            <button type="submit" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon">
                                <a style="color: white" href="{{ route('users.destroy', $user->id) }}">
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

@endsection
