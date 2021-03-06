@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">{{$action}} {{$title}}</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form method="post" action="{{ $route ."/".$skill->id }}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                                <label for="name">Name <strong style="color: red;"> &#42; </strong></label>
                                @error('name')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="name"
                                       placeholder="Skill" name="name" value="{{$skill->name}}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description <strong style="color: red;"> &#42; </strong></label>
                                @error('description')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <textarea name="description" class="form-control" id="description" cols="30" rows="10" style="resize: none">{{$skill->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="logo">Upload Logo</label>
                                @error('logo')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="file" id="logo" name="logo" class="dropify" data-default-file="{{asset('uploads/skills')."/".$skill->logo}}"/>
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
@endpush

@push('footer')
    <script>
        $('.dropify').dropify();
    </script>
@endpush
