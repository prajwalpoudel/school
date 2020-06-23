@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <div class="m-content">
            @include('user.admin.library.category.partials.form',
                        $data=[
                            'form-action' => 'admin.library.category.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Category',
                            'button-text' => 'Save',
                            'category' => null
                        ]
            )
        </div>
    </div>
@endsection
