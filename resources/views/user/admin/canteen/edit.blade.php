@extends('user.admin.layouts.master')

@section('breadcrumbs', $breadcrumbs)

@section('content')
    <div class="m-content">
        @include('user.admin.canteen.partials.form', [
            'form-action' => 'admin.canteen.update',
            'form-method' => 'patch',
            'form-title' => 'Edit Canteen',
            'button-text' => 'Update',
            'canteen' => $canteen,
        ])
    </div>
@endsection
