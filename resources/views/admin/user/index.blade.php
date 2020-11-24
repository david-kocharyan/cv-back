@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="white-box">
                <div class="">
                    @if(!is_null($data))
                    <h2 class="m-b-0 m-t-0">{{$data->full_name}}
                        <a href="{{$route."/".$data->id."/edit"}}" class="btn btn-circle btn-primary tooltip-primary" data-toggle="tooltip" data-placement="top" title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>

                        <form
                            onsubmit="if(confirm('Do You Really Want To Delete User?') == false) return false;"
                            style="display: inline-block" action="{{ $route."/".$data->id }}" method="post">
                            @csrf
                            @method("DELETE")
                            <a href="javascript:void(0)">
                                <button data-toggle="tooltip"
                                        data-placement="top" title="Delete"
                                        class="btn btn-danger btn-circle tooltip-danger"><i
                                        class="fas fa-trash"></i></button>
                            </a>
                        </form>
                    </h2>
                    <hr>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="white-box text-center">
                                <img src="{{asset('uploads/user'."/".$data->image)}}" class="img-responsive" />
                            </div>
                            <a href="{{asset('uploads/cv'."/".$data->cv)}}" download class="btn-warning btn">Download CV</a>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-6">
                            <h4 class="box-title m-t-40">Story</h4>
                            <p>{{$data->story}}</p>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3 class="box-title m-t-40">General Info</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td width="390">Email</td>
                                        <td> {{$data->email}} </td>
                                    </tr>
                                    <tr>
                                        <td>Site</td>
                                        <td> {{$data->site}} </td>
                                    </tr>
                                    <tr>
                                        <td>Degree</td>
                                        <td> {{$data->degree}} </td>
                                    </tr>
                                    <tr>
                                        <td>Job</td>
                                        <td> {{$data->job}} </td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td> {{$data->city}} </td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number</td>
                                        <td> {{$data->phone_number}} </td>
                                    </tr>
                                    <tr>
                                        <td>Date of Birth</td>
                                        <td> {{$data->dob}} </td>
                                    </tr>
                                    <tr>
                                        <td>Age</td>
                                        <td> {{\Carbon\Carbon::parse($data->dob)->age}} </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @else
                        <a class="btn btn-success" href="{{$route."/create"}}">Add User</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


@push('head')

@endpush

@push('footer')

@endpush



