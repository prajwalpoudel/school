@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <div class="m-content">
            @include('user.admin.calendar.group.partials.form',
                        $data=[
                            'form-action' => 'admin.calendar.group.update',
                            'form-method' => 'patch',
                            'form-title' => 'Update Group',
                            'button-text' => 'Update',
                            'group' => $group
                        ]
            )
        </div>
    </div>
@endsection
