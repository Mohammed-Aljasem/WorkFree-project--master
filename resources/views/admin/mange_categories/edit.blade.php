@extends('admin.layout.master')
@section('main')
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h5 class="title">edit category</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.update', $category->id) }}" method="post">
                    @csrf
                    {!! method_field('PUT') !!}
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Category name</label>
                                <input type="text" name="name" class="form-control" value="{{ $category->name }}"
                                    placeholder="web development">
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Category description</label>
                                <input type="text" name="description" class="form-control"
                                    value="{{ $category->description }}" placeholder="web development">
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
@endsection
