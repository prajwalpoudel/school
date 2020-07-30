@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Teacher'" :table-id="'teacher'" :theads="['First Name', 'Last Name', 'Email', 'Phone Number', 'Address','Salary', 'Action']" :button="['route' => 'admin.teacher.create', 'name' => 'Create', 'icon' => 'la la-plus']" :url="'/admin/teacher/list'" columns="[{ data: 'first_name', name: 'users.first_name' }, { data: 'last_name', name: 'users.last_name' }, { data: 'email', name: 'email' }, { data: 'phone', name: 'phone' }, { data: 'address', name: 'address' }, { data: 'salary', name: 'salary' }, { data: 'action', name: 'action', orderable: false, searchable: false }]">
        </x-tables.datatable>
    </div>
@endsection
