@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.accountant.partials.form',
                        $data=[
                            'form-action' => 'admin.accountant.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Accountant',
                            'button-text' => 'Save',
                            'accountant' => null
                        ]
            )
    </div>
@endsection
