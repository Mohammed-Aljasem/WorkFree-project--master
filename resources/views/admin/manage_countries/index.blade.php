@extends('admin.layout.master')
@section('main')
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Add Country</h5>
            </div>
            @if(Session::has('success'))
                <div class="alert alert-danger mt-3">
                    {{Session::get('success')}}
                </div>
            @endif
            <div class="card-body">
                <form action="{{route('countries.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Country name</label>
                                <input type="text" name="name" class="form-control" placeholder="syria">
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
                <h4 class="card-title">countries</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Country id
                                </th>
                                <th>
                                    Country name
                                </th>
                                <th class="text-center">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($countries))
                                @foreach($countries as $country)
                                    <tr>
                                        <td>
                                            {{$country->id}}
                                        </td >
                                        <td>
                                            {{$country->name}}
                                        </td>
                                        <td class="text-center">
                                            <form method="post" action="{{ route('countries.destroy', $country->id) }}">
                                                {{ csrf_field() }}
                                                   {{ method_field('DELETE') }}
                                                <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon">
                                                   <a style="color: white" href="{{ route('countries.edit', $country->id) }}">
                                                       <i class="tim-icons icon-settings"></i>
                                                   </a>
                                                </button>
                                                <button type="submit" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon">
                                                   <a style="color: white" href="{{ route('countries.destroy', $country->id) }}">
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
