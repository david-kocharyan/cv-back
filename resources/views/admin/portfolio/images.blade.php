@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <form method="post" action="{{ $route.'/create' }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="images">Images</label>
                        @error('images')
                        <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                        @enderror
                        <input type="file" class="form-control" id="images"
                               name="images[]" multiple required>
                    </div>

                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Save
                    </button>
                </form>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">{{$title}}</h3>

                {{--table--}}
                <div class="table-responsive">
                    <table id="datatable" class="display table table-hover table-striped nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Options</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($data as $key=>$val)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>
                                    <img src="{{asset('uploads/') ."/".$val->image}}" class="img-responsive" width="100">
                                </td>
                                <td>{{$val->date}}</td>
                                <td>
                                    <form
                                        onsubmit="if(confirm('Do You Really Want To Delete The Image?') == false) return false;"
                                        style="display: inline-block" action="{{ $route."/delete/".$val->id }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <a href="javascript:void(0)">
                                            <button data-toggle="tooltip"
                                                    data-placement="top" title="Delete"
                                                    class="btn btn-danger btn-circle tooltip-danger"><i
                                                    class="fas fa-trash"></i></button>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('head')
    <link href="{{asset('assets/plugins/datatables/media/css/dataTables.bootstrap.css')}}" rel="stylesheet"
          type="text/css"/>
@endpush

@push('footer')
    <!--Datatable js-->
    <script src="{{asset('assets/plugins/datatables/datatables.min.js')}}"></script>
    <script>
        $('#datatable').DataTable();
    </script>
@endpush



