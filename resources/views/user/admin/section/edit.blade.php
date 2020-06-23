@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.section.partials.form',
                    $data=[
                        'form-action' => 'admin.section.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Section',
                        'button-text' => 'Update',
                        'section' => $section,
                    ]
        )
    </div>
@endsection
