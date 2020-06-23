@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <div class="m-content">
            @include('user.admin.grade.partials.form',
                        $data=[
                            'form-action' => route('admin.grade.store'),
                            'form-method' => 'post',
                            'form-title' => 'Create Grade',
                            'button-text' => 'Save',
                            'grade' => null
                        ]
            )
        </div>
    </div>
@endsection
