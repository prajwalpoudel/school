@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.installment.partials.form',
                    $data=[
                        'form-action' => 'admin.installment.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Installment',
                        'button-text' => 'Update',
                        'installment' => $installment
                    ]
        )
    </div>
@endsection
