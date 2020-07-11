@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.driver.partials.form',
                    $data=[
                        'form-action' => 'admin.driver.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Driver',
                        'button-text' => 'Update',
                        'driver' => $driver
                    ]
        )
    </div>
@endsection
