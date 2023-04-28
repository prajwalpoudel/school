@extends('user.admin.layouts.master')

@section('breadcrumbs', $breadcrumbs)

@section('content')
    <div class="m-content">
        @include('user.admin.canteen.partials.form', [
            'form-action' => 'admin.canteen.store',
            'form-method' => 'post',
            'form-title' => 'Create Canteen',
            'button-text' => 'Save',
            'canteen' => null,
        ])
    </div>
@endsection
