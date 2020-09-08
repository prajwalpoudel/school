@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        @include('user.admin.cms_pages.partials.form',
                    $data=[
                        'form-action' => 'admin.cms_page.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Cms Page',
                        'button-text' => 'Update',
                        'cmsPage' => $cmsPage
                    ]
        )
    </div>
@endsection
