@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.student.partials.form',
                    $data=[
                        'form-action' => 'admin.student.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Student',
                        'button-text' => 'Update',
                        'student' => $student
                    ]
        )
    </div>
@endsection
