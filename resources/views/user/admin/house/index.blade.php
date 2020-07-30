@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'House'" :table-id="'house'" :theads="['ID', 'House Name', 'Captain', 'Color', 'Action']" :button="['route' => 'admin.house.create', 'name' => 'Create', 'icon' => 'la la-plus']" :url="'/admin/house/list'" columns="[{ data: 'id', name: 'id' }, { data: 'name', name: 'name' }, { data: 'house_captain_id', name: 'house_captain_id' },{ data: 'color', name: 'color' }, { data: 'action', name: 'action', orderable: false, searchable: false }]"></x-tables.datatable>
    </div>
@endsection
