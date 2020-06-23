@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <div class="m-content">
            @include('user.admin.discountPackage.partials.form',
                        $data=[
                            'form-action' => 'admin.discount_package.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Discount Package',
                            'button-text' => 'Save',
                            'discountPackage' => null
                        ]
            )
        </div>
    </div>
@endsection
