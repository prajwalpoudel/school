@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.discountPackage.partials.form',
                    $data=[
                        'form-action' => 'admin.discount_package.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Discount Package',
                        'button-text' => 'Update',
                        'discountPackage' => $discountPackage
                    ]
        )
    </div>
@endsection
