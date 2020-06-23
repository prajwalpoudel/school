@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Category'" :table-id="'category'" :theads="['ID', 'Name', 'Description', 'Code', 'Action']" :button="['route' => 'admin.library.category.create', 'name' => 'Create', 'icon' => 'la la-plus']" :url="'/admin/library/category/list'" columns="[{ data: 'id', name: 'id' }, { data: 'name', name: 'name' }, { data: 'description', name: 'description' }, { data: 'code', name: 'code' }, { data: 'action', name: 'action', orderable: false, searchable: false }]"></x-tables.datatable>
    </div>
@endsection
