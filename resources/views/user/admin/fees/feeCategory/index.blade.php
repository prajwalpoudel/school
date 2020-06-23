@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Fee Category'" :table-id="'fee_category'" :theads="['ID', 'Name', 'Description', 'Action']" :button="['route' => 'admin.fee_category.create', 'name' => 'Create', 'icon' => 'la la-plus']" :url="'/admin/fee_category/list'" columns="[{ data: 'id', name: 'id' }, { data: 'name', name: 'name' }, { data: 'description', name: 'description' }, { data: 'action', name: 'action', orderable: false, searchable: false }]"></x-tables.datatable>
    </div>
@endsection
