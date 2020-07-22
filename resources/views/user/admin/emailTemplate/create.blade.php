@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <div class="m-content">
            @include('user.admin.emailTemplate.partials.form',
                        $data=[
                            'form-action' => 'admin.email_template.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Email Template',
                            'button-text' => 'Save',
                            'emailTemplate' => null
                        ]
            )
        </div>
    </div>
@endsection
