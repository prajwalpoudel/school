@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <div class="m-content">
            @include('user.admin.fees.feeCategory.partials.form',
                        $data=[
                            'form-action' => 'admin.fee_category.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Fee Category',
                            'button-text' => 'Save',
                            'feeCategory' => null
                        ]
            )
        </div>
    </div>
@endsection
