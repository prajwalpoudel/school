@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.teacher.partials.form',
                        $data=[
                            'form-action' => 'admin.teacher.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Teacher',
                            'button-text' => 'Save',
                            'teacher' => null
                        ]
            )
    </div>
@endsection
