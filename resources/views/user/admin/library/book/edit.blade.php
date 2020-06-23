@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.library.book.partials.form',
                    $data=[
                        'form-action' => 'admin.library.book.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Book',
                        'button-text' => 'Update',
                        'book' => $book
                    ]
        )
    </div>
@endsection
