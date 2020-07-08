@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <div class="m-content">
            @include('user.admin.vehicle.partials.form',
                        $data=[
                            'form-action' => 'admin.vehicle.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Vehicle',
                            'button-text' => 'Save',
                            'vehicle' => null
                        ]
            )
        </div>
    </div>
@endsection
