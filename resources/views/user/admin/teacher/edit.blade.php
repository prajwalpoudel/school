@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.teacher.partials.form',
                    $data=[
                        'form-action' => 'admin.teacher.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Teacher',
                        'button-text' => 'Update',
                        'teacher' => $teacher
                    ]
        )
    </div>
@endsection
