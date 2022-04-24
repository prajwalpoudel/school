@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-tables.datatable
            :title="'Cms Pages'"
            :table-id="'cms_pages'"
            :theads="['ID', 'Section Title', 'Description', 'Action']"
            :button="['route' => 'admin.cms-page.create', 'name' => 'Create', 'icon' => 'la la-plus']"
            :url="'/admin/cms-page/list'"
            columns="[{ data: 'id', name: 'id' }, { data: 'section_title', name: 'section_title' }, { data: 'description', name: 'description' },  { data: 'action', name: 'action', orderable: false, searchable: false }]"></x-tables.datatable>
    </div>
@endsection
