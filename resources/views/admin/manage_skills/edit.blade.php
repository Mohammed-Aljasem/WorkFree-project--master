@extends('admin.layout.master')
@section('main')
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Add Admin</h5>
            </div>
            <div class="card-body">
                <form action="{{route('skills.update', $skill->id)}}" method="post">
                    @csrf
                    {!! method_field('PUT') !!}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="name" class="form-control" placeholder="javascript" value="{{$skill->name}}">
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
@endsection
