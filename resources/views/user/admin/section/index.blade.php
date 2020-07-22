@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Section'" :table-id="'section'" :theads="['ID', 'Section', 'Section Teacher', 'Section Representative', 'Section Vice Representative', 'Action']" :button="['route' => 'admin.section.create', 'name' => 'Create', 'icon' => 'la la-plus']" :url="'/admin/section/list'" columns="[{ data: 'id', name: 'id' }, { data: 'name', name: 'name' }, { data: 'section_teacher_name', name: 'section_teacher_name' }, { data: 'section_representative_name', name: 'section_representative_name' }, { data: 'section_vice_representative_name', name: 'section_vice_representative_name' }, { data: 'action', name: 'action', orderable: false, searchable: false }]"></x-tables.datatable>
    </div>
@endsection
