@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">{{$action}} {{$title}}</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form method="post" action="{{ $route ."/". $work->id }}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                                <label for="position">Position<strong style="color: red;"> &#42; </strong></label>
                                @error('position')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="position"
                                       placeholder="Position" name="position" value="{{$work->position}}">
                            </div>

                            <div class="form-group">
                                <label for="company">Company<strong style="color: red;"> &#42; </strong></label>
                                @error('company')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="company"
                                       placeholder="Company" name="company" value="{{$work->company}}">
                            </div>

                            <div class="form-group">
                                <label for="description">Description<strong style="color: red;"> &#42; </strong></label>
                                @error('description')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10" style="resize: none">{{$work->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="start">Start<strong style="color: red;"> &#42; </strong></label>
                                @error('start')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="start" placeholder="yyyy-mm-dd" name="start"
                                       value="{{$work->start}}">
                            </div>

                            <div class="form-group">
                                <label for="end">End</label>
                                @error('end')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="end" placeholder="yyyy-mm-dd" name="end"
                                       value="{{$work->end}}">
                            </div>

                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('head')
    <!-- Date picker plugins css -->
    <link href="{{asset('assets/plugins/datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Date Picker Plugin JavaScript -->
    <script src="{{asset('assets/plugins/datepicker/bootstrap-datepicker.min.js')}}"></script>
@endpush

@push('footer')
    <script>
        $('#start').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd',
        });

        $('#end').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd',
        });
    </script>
@endpush
