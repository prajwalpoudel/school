@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.house.partials.form',
                    $data=[
                        'form-action' => 'admin.house.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit House',
                        'button-text' => 'Update',
                        'house' => $house
                    ]
        )
    </div>
@endsection
