@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Route'" :table-id="'route'" :theads="['ID', 'Vehicle', 'Route', 'Action']" :button="['route' => 'admin.route.create', 'name' => 'Create', 'icon' => 'la la-plus']" :url="'/admin/route/list'" columns="[{ data: 'id', name: 'id' }, { data: 'vehicle', name: 'vehicle' }, { data: 'route', name: 'route' }, { data: 'action', name: 'action', orderable: false, searchable: false }]"></x-tables.datatable>
    </div>
@endsection
