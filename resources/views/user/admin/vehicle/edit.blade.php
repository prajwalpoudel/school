@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.vehicle.partials.form',
                    $data=[
                        'form-action' => 'admin.vehicle.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Vehicle',
                        'button-text' => 'Update',
                        'vehicle' => $vehicle
                    ]
        )
    </div>
@endsection
