@extends('layouts.app')
@section('title', 'Error')

@section('content')
@if(session('danger'))
<div class="alert alert-danger d-flex fixed-alert justify-content-start align-items-center alert-dismissible fade show"
    role="alert">
    {{ session('danger') }}
    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@endsection