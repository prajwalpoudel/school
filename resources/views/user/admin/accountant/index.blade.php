@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Accountant'" :table-id="'accountant'" :theads="['First Name', 'Last Name','Phone Number', 'Email', 'Address','Salary', 'Action']" :button="['route' => 'admin.accountant.create', 'name' => 'Create', 'icon' => 'la la-plus']" :url="'/admin/accountant/list'" columns="[{ data: 'first_name', name: 'users.first_name' }, { data: 'last_name', name: 'users.last_name' },{ data: 'phone', name: 'user_details.phone' }, { data: 'email', name: 'users.email' }, { data: 'address', name: 'user_details.address' }, { data: 'salary', name: 'salary' }, { data: 'action', name: 'action', orderable: false, searchable: false }]">
        </x-tables.datatable>
    </div>
@endsection
