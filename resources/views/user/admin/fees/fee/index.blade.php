@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Fee'" :table-id="'Fee'" :theads="['ID', 'Grade', 'Category', 'Amount', 'Action']" :button="['route' => 'admin.fee.create', 'name' => 'Create', 'icon' => 'la la-plus']" :url="'/admin/fee/list'" columns="[{ data: 'id', name: 'id' }, { data: 'grade_name', name: 'grade_name' }, { data: 'category_name', name: 'category_name' }, { data: 'amount', name: 'amount' }, { data: 'action', name: 'action', orderable: false, searchable: false }]"></x-tables.datatable>
    </div>
@endsection
