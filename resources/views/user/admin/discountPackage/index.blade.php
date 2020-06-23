@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Discount Package'" :table-id="'discount_package'" :theads="['ID', 'Name', 'Description', 'Fee Category', 'Amount', 'Action']" :button="['route' => 'admin.discount_package.create', 'name' => 'Create', 'icon' => 'la la-plus']" :url="'/admin/discount_package/list'" columns="[{ data: 'id', name: 'id' }, { data: 'name', name: 'name' }, { data: 'description', name: 'description' }, { data: 'fee_category', name: 'fee_category' }, { data: 'amount', name: 'amount' }, { data: 'action', name: 'action', orderable: false, searchable: false }]"></x-tables.datatable>
    </div>
@endsection
