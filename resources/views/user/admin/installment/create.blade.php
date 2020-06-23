@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <div class="m-content">
            @include('user.admin.installment.partials.form',
                        $data=[
                            'form-action' => 'admin.installment.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Installment',
                            'button-text' => 'Save',
                            'installment' => null
                        ]
            )
        </div>
    </div>
@endsection
