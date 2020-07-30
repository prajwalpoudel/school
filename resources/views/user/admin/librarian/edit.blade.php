@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.librarian.partials.form',
                    $data=[
                        'form-action' => 'admin.librarian.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Librarian',
                        'button-text' => 'Update',
                        'librarian' => $librarian
                    ]
        )
    </div>
@endsection
