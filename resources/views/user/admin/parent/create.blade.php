@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.parent.partials.form',
                        $data=[
                            'form-action' => 'admin.parent.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Parent',
                            'button-text' => 'Save',
                            'parent' => null
                        ]
            )
    </div>
@endsection
