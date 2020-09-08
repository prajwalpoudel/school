@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <class-routine :sections="{{ $sections }}" :grades="{{ $grades }}" :subjects="{{ $subjects }}" :teachers="{{ $teachers }}" :days = {{ $days }}></class-routine>
    </div>
@endsection
