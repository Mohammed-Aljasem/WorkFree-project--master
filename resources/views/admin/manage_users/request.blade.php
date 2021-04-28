@extends('admin.layout.master')
@section('main')
    {{-- table for freelancers requests --}}
    <div class="col-md-12">
        <div class="card">

            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Email</th>
                        {{-- <th class="text-right">Salary</th> --}}
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @if (!empty($users))
                        @foreach ($users as $key => $user)

                            @if ($users[$key]->userRole->id == 3 && $user->confirm_account == 0)
                                <tr>
                                    <td class="text-center">{{ $user->id }}</td>
                                    <td>{{ $user->first_name }}-{{ $user->last_name }}</td>
                                    <td>{{ $users[$key]->category->name }}</td>
                                    <td>{{ $user->email }}</td>

                                    <td class="td-actions text-right">
                                        <form method="post" action="{{ route('users.destroy', $user->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="button" rel="tooltip"
                                                class="btn btn-info btn-sm btn-round btn-icon">
                                                <a style="color: white" href="">
                                                    <i class="tim-icons icon-single-02"></i>
                                                </a>
                                            </button>
                                            <button type="button" rel="tooltip"
                                                class="btn btn-success btn-sm btn-round btn-icon">
                                                <a style="color: white"
                                                    href="{{ url('/admin/confirm_user/' . $user->id) }}">
                                                    <i class="tim-icons icon-settings"></i>
                                                </a>
                                            </button>
                                            <button type="submit" rel="tooltip"
                                                class="btn btn-danger btn-sm btn-round btn-icon">
                                                <a style="color: white" href="{{ route('users.destroy', $user->id) }}">
                                                    <i class="tim-icons icon-simple-remove"></i>
                                                </a>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    {{-- table for clients accept requsts --}}
    <div class="col-md-12">
        <div class="card">

            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Email</th>

                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($users))
                        @foreach ($users as $key => $user)
                            @if ($users[$key]->userRole->id == 4 && $user->confirm_account == 0)
                                <tr>
                                    <td class="text-center">{{ $user->id }}</td>
                                    <td>{{ $user->first_name }}-{{ $user->last_name }}</td>
                                    <td>{{ $users[$key]->category->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="td-actions text-right">
                                        <form method="post" action="{{ route('users.destroy', $user->id) }}">
                                            {{ csrf_field() }}
                                            {{-- {{ method_field('DELETE') }} --}}

                                            <button type="button" rel="tooltip"
                                                class="btn btn-info btn-sm btn-round btn-icon">
                                                <a style="color: white" href="">
                                                    <i class="tim-icons icon-single-02"></i>
                                                </a>
                                            </button>
                                            <button type="button" rel="tooltip"
                                                class="btn btn-success btn-sm btn-round btn-icon">
                                                <a style="color: white"
                                                    href="{{ url('/admin/confirm_user/' . $user->id) }}">
                                                    <i class="tim-icons icon-settings"></i>
                                                </a>
                                            </button>
                                            <button type="submit" rel="tooltip"
                                                class="btn btn-danger btn-sm btn-round btn-icon">
                                                <a style="color: white" href="{{ route('users.destroy', $user->id) }}">
                                                    <i class="tim-icons icon-simple-remove"></i>
                                                </a>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection
