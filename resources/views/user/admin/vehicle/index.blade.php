@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Vehicle'" :table-id="'vehicle'" :theads="['ID', 'Vehicle', 'Driver Name', 'Driver Contact No', 'Action']" :button="['route' => 'admin.vehicle.create', 'name' => 'Create', 'icon' => 'la la-plus']" :url="'/admin/vehicle/list'" columns="[{ data: 'id', name: 'id' }, { data: 'name', name: 'name' }, { data: 'driver_name', name: 'driver_name' },{ data: 'driver_number', name: 'driver_number' }, { data: 'action', name: 'action', orderable: false, searchable: false }]"></x-tables.datatable>
    </div>
@endsection
