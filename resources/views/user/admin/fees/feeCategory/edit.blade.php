@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.fees.feeCategory.partials.form',
                    $data=[
                        'form-action' => 'admin.fee_category.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Fee Category',
                        'button-text' => 'Update',
                        'feeCategory' => $feeCategory
                    ]
        )
    </div>
@endsection
