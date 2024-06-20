@extends('layouts.app')

@section('content')

<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="https:codingtricks.io">Codingtricks</a>
        <span class="breadcrumb-item active">Demo</span>
    </nav>
</div>

<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">All Government Universities</h4>
    <p class="mg-b-0">Get all Government Universities, their faculties & degress</p>
</div>

<div class="br-pagebody">

     <div class="row pd-t-20">
        <div class="col-lg-4">
            <div class="form-group has-success mg-b-0">
                <select class="form-control select2" data-placeholder="Choose your University" name="university" id="university">
                <option value="">Choose University</option>
                @foreach ($universities as $university )
                    <option value="{{ $university }}">{{ $university}}</option>
                @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
            <div class="form-group has-warning mg-b-0">
                <select class="form-control select2" data-placeholder="Choose your Faculty" name="faculty" id="faculty">
                </select>
            </div>
        </div>

        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
            <div class="form-group has-warning mg-b-0">
                <select class="form-control select2" data-placeholder="Choose your Degree" name="degree" id="degree">
                </select>
            </div>
        </div>
     </div>

</div>

@endsection

@section('js')
 <script type="text/javascript">
    $('select[name="university"]').on('change', function() {
        var university = $(this).val();
        if (university) {
            $.ajax({
            url: "{{ config('app.url') }}/get/faculty/university/" + university, 
            type: "GET", 
            dataType: "json", 
            beforeSend: function() {
                $('#loader').css('visibility', 'visible');
            },
            success: function(data) {
                $('select[name="faculty"]').empty();
                $('select[name="faculty"]').append('<option value="">Select a Faculty</option>');
                $.each(data, function(key, value) {
                    $('select[name="faculty"]').append('<option value="' + value + '">' + value + '</option>');
                });
            },
            complete: function() {
                $('#loader').css('visibility', 'hidden');
                }
            });
        }
    });
    $('select[name="faculty"]').on('change', function() {
        var faculty = $(this).val();
        if (faculty) {
            $.ajax({
            url: "{{ config('app.url') }}/get/degree/faculty/" + faculty, 
            type: "GET", 
            dataType: "json", 
            beforeSend: function() {
                $('#loader').css('visibility', 'visible');
            },
            success: function(data) {
                $('select[name="degree"]').empty();
                $('select[name="degree"]').append('<option value="">Select a Degree</option>');
                $.each(data, function(key, value) {
                    $('select[name="degree"]').append('<option value="' + value + '">' + value + '</option>');
                });
            },
            complete: function() {
                $('#loader').css('visibility', 'hidden');
                }
            });
        }
    });

 </script>

@endsection