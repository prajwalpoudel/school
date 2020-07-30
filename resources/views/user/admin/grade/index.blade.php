@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-tables.datatable
            :title="'Grade'"
            :table-id="'grade'"
            :theads="['ID', 'Grade', 'Name', 'No. of Sections', 'No. of Students', 'Action']"
            :button="['route' => 'admin.grade.create', 'name' => 'Create', 'icon' => 'la la-plus']"
            :url="'/admin/grade/list'"
            columns="[{ data: 'id', name: 'id' }, { data: 'name', name: 'name' }, { data: 'display_name', name: 'display_name' }, { data: 'no_of_sections', name: 'no_of_sections' }, { data: 'no_of_students', name: 'no_of_students' }, { data: 'action', name: 'action', orderable: false, searchable: false }]"></x-tables.datatable>
    </div>
@endsection
