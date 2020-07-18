@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Calendar Group'" :table-id="'calendar_group'" :theads="['ID', 'Title', 'Color', 'Action']" :button="['route' => 'admin.calendar.group.create', 'name' => 'Create', 'icon' => 'la la-plus']" :url="'/admin/calendar/group/list'" columns="[{ data: 'id', name: 'id' }, { data: 'title', name: 'title' }, { data: 'color_code', name: 'color_code' }, { data: 'action', name: 'action', orderable: false, searchable: false }]"></x-tables.datatable>
    </div>
@endsection
