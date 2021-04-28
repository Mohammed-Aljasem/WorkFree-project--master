@extends('admin.layout.master')
@section('main')
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Add Technology </h5>
            </div>
            <div class="card-body">
                <form action="{{route('skills.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Technology name</label>
                                <input type="text" name="name" class="form-control" placeholder="Html5">
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
                <h4 class="card-title">Technologies</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Technology id
                                </th>
                                <th>
                                    Technology name
                                </th>
                                <th class="text-center">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($skills))
                                @foreach($skills as $skill)
                                    <tr>
                                        <td>
                                            {{$skill->id}}
                                        </td >
                                        <td>
                                            {{$skill->name}}
                                        </td>
                                        <td class="text-center">
                                            <form method="post" action="{{ route('skills.destroy', $skill->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon">
                                                   <a style="color: white" href="{{ route('skills.edit', $skill->id) }}">
                                                       <i class="tim-icons icon-settings"></i>
                                                   </a>
                                                </button>
                                                <button type="submit" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon">
                                                   <a style="color: white" href="{{ route('skills.destroy', $skill->id) }}">
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
