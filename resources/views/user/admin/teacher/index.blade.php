@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Teacher'" :table-id="'teacher'" :theads="['First Name', 'Last Name','Phone Number', 'Email', 'Address', 'Action']" :button="['route' => 'admin.teacher.create', 'name' => 'Create', 'icon' => 'la la-plus']" :url="'/admin/teacher/list'" columns="[{ data: 'first_name', name: 'users.first_name' }, { data: 'last_name', name: 'users.last_name' },{ data: 'phone', name: 'user_details.phone' }, { data: 'email', name: 'users.email' }, { data: 'address', name: 'user_details.address' }, { data: 'action', name: 'action', orderable: false, searchable: false }]">
        </x-tables.datatable>
    </div>
@endsection
