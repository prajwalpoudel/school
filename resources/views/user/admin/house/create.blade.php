@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <div class="m-content">
            @include('user.admin.house.partials.form',
                        $data=[
                            'form-action' => 'admin.house.store',
                            'form-method' => 'post',
                            'form-title' => 'Create House',
                            'button-text' => 'Save',
                            'house' => null
                        ]
            )
        </div>
    </div>
@endsection
