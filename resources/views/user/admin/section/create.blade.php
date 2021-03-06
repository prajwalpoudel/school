@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <div class="m-content">
            @include('user.admin.section.partials.form',
                        $data=[
                            'form-action' => 'admin.section.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Section',
                            'button-text' => 'Save',
                            'section' => null
                        ]
            )
        </div>
    </div>
@endsection
