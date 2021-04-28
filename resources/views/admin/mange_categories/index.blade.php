@extends('admin.layout.master')
@section('main')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Add category</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Category name</label>
                                <input type="text" name="name" class="form-control" placeholder="web development">
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Category description</label>
                                <input type="text" name="description" class="form-control" placeholder="web development">
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>click to upload image</label>
                                <input type="file" name="image" placeholder="">
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
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">categories</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    id
                                </th>
                                <th>
                                    Category name
                                </th>
                                <th>
                                    Category description
                                </th>
                                <th class="text-center">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($categories))
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>
                                            {{ $category->id }}
                                        </td>
                                        <td>
                                            {{ $category->name }}
                                        </td>
                                        <td>
                                            {{ $category->description }}
                                        </td>
                                        <td class="text-center">
                                            <form method="post" action="{{ route('categories.destroy', $category->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="button" rel="tooltip"
                                                    class="btn btn-success btn-sm btn-round btn-icon">
                                                    <a style="color: white"
                                                        href="{{ route('categories.edit', $category->id) }}">
                                                        <i class="tim-icons icon-settings"></i>
                                                    </a>
                                                </button>
                                                <button type="submit" rel="tooltip"
                                                    class="btn btn-danger btn-sm btn-round btn-icon">
                                                    <a style="color: white"
                                                        href="{{ route('categories.destroy', $category->id) }}">
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
