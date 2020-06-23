@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.fees.fee.partials.form',
                    $data=[
                        'form-action' => 'admin.fee.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Fee',
                        'button-text' => 'Update',
                        'fee' => $fee
                    ]
        )
    </div>
@endsection
