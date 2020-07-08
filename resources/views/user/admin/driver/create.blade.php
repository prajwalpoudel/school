@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.driver.partials.form',
                        $data=[
                            'form-action' => 'admin.driver.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Driver',
                            'button-text' => 'Save',
                            'driver' => null
                        ]
            )
    </div>
@endsection
