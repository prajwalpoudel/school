@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <div class="m-content">
            @include('user.admin.canteen.partials.form',
                        $data=[
                            'form-action' => 'admin.canteen.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Canteen',
                            'button-text' => 'Save',
                            'canteen' => null
                        ]
            )
        </div>
    </div>
@endsection
