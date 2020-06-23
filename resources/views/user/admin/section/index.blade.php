@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Section'" :table-id="'section'" :theads="['ID', 'Section', 'Name', 'Action']" :button="['route' => 'admin.section.create', 'name' => 'Create', 'icon' => 'la la-plus']" :url="'/admin/section/list'" columns="[{ data: 'id', name: 'id' }, { data: 'name', name: 'name' }, { data: 'display_name', name: 'display_name' }, { data: 'action', name: 'action', orderable: false, searchable: false }]"></x-tables.datatable>
    </div>
@endsection
