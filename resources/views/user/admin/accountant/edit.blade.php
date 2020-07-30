@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.accountant.partials.form',
                    $data=[
                        'form-action' => 'admin.accountant.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Accountant',
                        'button-text' => 'Update',
                        'accountant' => $accountant
                    ]
        )
    </div>
@endsection
