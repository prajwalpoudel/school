@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.parent.partials.form',
                    $data=[
                        'form-action' => 'admin.parent.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Parent',
                        'button-text' => 'Update',
                        'parent' => $parent
                    ]
        )
    </div>
@endsection
