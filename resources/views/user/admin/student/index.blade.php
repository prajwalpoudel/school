@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Student'" :table-id="'student'" :theads="['First Name', 'Last Name', 'Email', 'Address', 'Grade', 'Section','House', 'Action']" :button="['route' => 'admin.student.create', 'name' => 'Create', 'icon' => 'la la-plus']" :url="'/admin/student/list'" columns="[{ data: 'first_name', name: 'first_name' }, { data: 'last_name', name: 'users.last_name' }, { data: 'email', name: 'users.email' }, { data: 'address', name: 'user_details.address' }, { data: 'grade', name: 'grades.name' }, { data: 'section', name: 'sections.name' },{ data: 'house', name: 'house' }, { data: 'action', name: 'action', orderable: false, searchable: false }]">
            <x-slot name="contentHeader">
                @include('user.admin.student.content_header')
            </x-slot>
        </x-tables.datatable>
    </div>
@endsection
