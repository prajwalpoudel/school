@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.library.category.partials.form',
                    $data=[
                        'form-action' => 'admin.library.category.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Category',
                        'button-text' => 'Update',
                        'category' => $category
                    ]
        )
    </div>
@endsection
