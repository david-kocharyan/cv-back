@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">{{$title}}</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form method="post" action="{{ $route."/".$user->id }}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label for="full_name">Full Name <strong style="color: red;"> &#42; </strong></label>
                                @error('full_name')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="full_name"
                                       placeholder="Full name" name="full_name" value="{{$user->full_name}}">
                            </div>

                            <div class="form-group">
                                <label for="dob">Date Of Birth <strong style="color: red;"> &#42; </strong></label>
                                @error('dob')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="dob" placeholder="yyyy-mm-dd" name="dob"
                                       value="{{$user->dob}}">
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Phone Number <strong style="color: red;">
                                        &#42; </strong></label>
                                @error('phone_number')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="phone_number"
                                       placeholder="Phone Number" name="phone_number" value="{{$user->phone_number}}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email <strong style="color: red;"> &#42; </strong></label>
                                @error('email')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="email"
                                       placeholder="Email" name="email" value="{{$user->email}}">
                            </div>

                            <div class="form-group">
                                <label for="site">Site <strong style="color: red;"> &#42; </strong></label>
                                @error('site')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="site"
                                       placeholder="Site" name="site" value="{{$user->site}}">
                            </div>

                            <div class="form-group">
                                <label for="degree">Degree <strong style="color: red;"> &#42; </strong></label>
                                @error('degree')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="degree"
                                       placeholder="Degree" name="degree" value="{{$user->degree}}">
                            </div>

                            <div class="form-group">
                                <label for="city">City <strong style="color: red;"> &#42; </strong></label>
                                @error('city')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="city"
                                       placeholder="City" name="city" value="{{$user->city}}">
                            </div>

                            <div class="form-group">
                                <label for="job">Job <strong style="color: red;"> &#42; </strong></label>
                                @error('job')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="job"
                                       placeholder="Job" name="job" value="{{$user->job}}">
                            </div>

                            <div class="form-group">
                                <label for="story">Story <strong style="color: red;"> &#42; </strong></label>
                                @error('story')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <textarea name="story" class="form-control" id="story" cols="30" rows="10" style="resize: none">{{$user->story}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Upload Image</label>
                                @error('image')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="file" id="image" name="image" class="dropify"
                                       data-default-file="{{asset('uploads/user') . "/". $user->image}}"/>
                            </div>

                            <div class="form-group">
                                <label for="cv">Upload Cv</label>
                                @error('cv')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="file" id="cv" name="cv"/>
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
    <!-- Dropify plugins css -->
    <link rel="stylesheet" href="{{asset('assets/plugins/dropify/dist/css/dropify.min.css')}}">
    <!-- jQuery file upload -->
    <script src="{{asset('assets/plugins/dropify/dist/js/dropify.min.js')}}"></script>

    <!-- Date picker plugins css -->
    <link href="{{asset('assets/plugins/datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Date Picker Plugin JavaScript -->
    <script src="{{asset('assets/plugins/datepicker/bootstrap-datepicker.min.js')}}"></script>
@endpush

@push('footer')
    <script>
        $('.dropify').dropify();

        $('#dob').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd',
        });
    </script>
@endpush
