@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.student.partials.form',
                        $data=[
                            'form-action' => 'admin.student.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Student',
                            'button-text' => 'Save',
                            'student' => null
                        ]
            )
    </div>
@endsection
