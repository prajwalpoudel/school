@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <div class="m-content">
            @include('user.admin.subject.partials.form',
                        $data=[
                            'form-action' => 'admin.subject.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Subject',
                            'button-text' => 'Save',
                            'subject' => null
                        ]
            )
        </div>
    </div>
@endsection
