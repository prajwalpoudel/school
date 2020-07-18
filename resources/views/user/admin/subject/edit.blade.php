@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.subject.partials.form',
                    $data=[
                        'form-action' => 'admin.subject.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Subject',
                        'button-text' => 'Update',
                        'subject' => $subject,
                    ]
        )
    </div>
@endsection
