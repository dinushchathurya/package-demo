@extends('layouts.app')

@section('content')

<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="https:codingtricks.io">Codingtricks</a>
        <span class="breadcrumb-item active">Demo</span>
    </nav>
</div>

<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">GN Divisions</h4>
    <p class="mg-b-0">Get all SriLankan GN Divisions</p>
</div>

<div class="br-pagebody">

    <div class="row pd-t-20">

        <div class="col-lg-4">
            <div class="form-group has-success mg-b-0">
                <select class="form-control select2" data-placeholder="Choose your District" name="district" id="district">
                    <option value="">Choose District</option>
                    @foreach ($districts as $district)
                    <option value="{{ $district }}">{{ $district}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
            <div class="form-group has-warning mg-b-0">
                <select class="form-control select2" data-placeholder="Choose your Divisional Secretariats" name="secretariat" id="secretariat">
                </select>
            </div>
        </div>

        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
            <div class="form-group has-warning mg-b-0">
                <select class="form-control select2" data-placeholder="Choose Division" name="division" id="division">
                </select>
            </div>
        </div>

    </div>

</div>

@endsection

@section('js')
<script type="text/javascript">
    $('select[name="district"]').on('change', function() {
        var district = $(this).val();
        if (district) {
            $.ajax({
                url: "{{ config('app.url') }}/get/local/district/" + district
                , type: "GET"
                , dataType: "json"
                , beforeSend: function() {
                    $('#loader').css('visibility', 'visible');
                }
                , success: function(data) {
                    $('select[name="secretariat"]').empty();
                    $('select[name="secretariat"]').append('<option value="">Select a District</option>');
                    $.each(data, function(key, value) {
                        $('select[name="secretariat"]').append('<option value="' + value + '">' + value + '</option>');
                    });
                }
                , complete: function() {
                    $('#loader').css('visibility', 'hidden');
                }
            });
        }
    });
    $('select[name="secretariat"]').on('change', function() {
        var secretariat = $(this).val();
        if (secretariat) {
            $.ajax({
                url: "{{ config('app.url') }}/get/local/secretariat/" + secretariat
                , type: "GET"
                , dataType: "json"
                , beforeSend: function() {
                    $('#loader').css('visibility', 'visible');
                }
                , success: function(data) {
                    $('select[name="division"]').empty();
                    $('select[name="division"]').append('<option value="">Select a Division</option>');
                    $.each(data, function(key, value) {
                        $('select[name="division"]').append('<option value="' + value + '">' + value + '</option>');
                    });
                }
                , complete: function() {
                    $('#loader').css('visibility', 'hidden');
                }
            });
        }
    });

</script>

@endsection