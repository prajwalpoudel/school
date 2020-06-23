@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.grade.partials.form',
                    $data=[
                        'form-action' => route('admin.grade.update', $grade->id),
                        'form-method' => 'patch',
                        'form-title' => 'Edit Grade',
                        'button-text' => 'Update',
                        'grade' => $grade
                    ]
        )
    </div>
@endsection
