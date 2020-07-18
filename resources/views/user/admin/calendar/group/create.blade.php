@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <div class="m-content">
            @include('user.admin.calendar.group.partials.form',
                        $data=[
                            'form-action' => 'admin.calendar.group.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Group',
                            'button-text' => 'Save',
                            'group' => null
                        ]
            )
        </div>
    </div>
@endsection
