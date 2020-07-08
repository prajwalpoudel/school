@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.route.partials.form',
                    $data=[
                        'form-action' => 'admin.route.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Route',
                        'button-text' => 'Update',
                        'route' => $route
                    ]
        )
    </div>
@endsection
