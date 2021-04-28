@extends('admin.layout.master')
@section('main')
    {{-- table for freelancers requests --}}
    <div class="col-md-12">
        <div class="card">

            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>User name</th>
                        {{-- <th class="text-right">Salary</th> --}}
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @if (!empty($posts))
                        @foreach ($posts as $key => $post)

                            @if ($post->approved_post == 0)
                                <tr>
                                    <td class="text-center">{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $posts[$key]->category->name }}</td>
                                    <td>{{ $posts[$key]->user->first_name }}-{{ $posts[$key]->user->last_name }}</td>
                                    <td class="td-actions text-right">
                                        <form method="post" action="{{ url('/admin/post_delete/' . $post->id) }}">
                                            {{ csrf_field() }}


                                            <button type="button" rel="tooltip"
                                                class="btn btn-info btn-sm btn-round btn-icon">
                                                <a style="color: white"
                                                    href="{{ url('/admin/post_approve/' . $post->id) }}">
                                                    <i class="tim-icons icon-check-2"></i>
                                                </a>
                                            </button>
                                            <button type="button" rel="tooltip"
                                                class="btn btn-success btn-sm btn-round btn-icon">
                                                <a style="color: white" href="{{ url('/admin/post_view/' . $post->id) }}">
                                                    <i class="tim-icons icon-settings"></i>
                                                </a>
                                            </button>
                                            <button type="button" rel="tooltip"
                                                class="btn btn-warning btn-sm btn-round btn-icon">
                                                <a style="color: white"
                                                    href="{{ url('/admin/post_reject/' . $post->id) }}">
                                                    <i class="tim-icons icon-pencil"></i>
                                                </a>
                                            </button>
                                            <button type="button" rel="tooltip"
                                                class="btn btn-danger btn-sm btn-round btn-icon">
                                                <a style="color: white"
                                                    href="{{ url('/admin/post_delete/' . $post->id) }}">
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
