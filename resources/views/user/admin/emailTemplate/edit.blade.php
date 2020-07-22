@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.emailTemplate.partials.form',
                    $data=[
                        'form-action' => 'admin.email_template.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Email Template',
                        'button-text' => 'Update',
                        'emailTemplate' => $emailTemplate
                    ]
        )
    </div>
@endsection
