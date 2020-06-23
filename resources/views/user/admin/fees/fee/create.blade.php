@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <div class="m-content">
            @include('user.admin.fees.fee.partials.form',
                        $data=[
                            'form-action' => 'admin.fee.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Fee',
                            'button-text' => 'Save',
                            'fee' => null
                        ]
            )
        </div>
    </div>
@endsection
