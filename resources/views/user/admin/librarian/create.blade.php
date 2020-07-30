@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.librarian.partials.form',
                        $data=[
                            'form-action' => 'admin.librarian.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Librarian',
                            'button-text' => 'Save',
                            'librarian' => null
                        ]
            )
    </div>
@endsection
