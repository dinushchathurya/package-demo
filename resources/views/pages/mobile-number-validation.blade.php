@extends('layouts.app')

@section('content')

<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="https:codingtricks.io">Codingtricks</a>
        <span class="breadcrumb-item active">Demo</span>
    </nav>
</div>

<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Sri Lankan Mobile Number Validator</h4>
    <p class="mg-b-0">Sri Lankan Mobile Number Validator</p>
</div>

<div class="br-pagebody">
    <div class="">
        <form method="POST" action="{{ route('validate.mobile') }}">
            @csrf
                <div class="row ">
                    <div class="col-md-6">
                        <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>

                        @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>        
                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Validate') }}
                        </button>
                    </div>
                </div>
         </form>
    </div>

</div>

@endsection

@section('js')
<script type="text/javascript">

</script>

@endsection