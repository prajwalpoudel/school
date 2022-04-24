@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <div class="m-content">
            @include('user.admin.cms_pages.partials.form',
                        $data=[
                            'form-action' => 'admin.cms-page.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Cms Page',
                            'button-text' => 'Save',
                            'cmsPage' => null
                        ]
            )
        </div>
    </div>
@endsection
