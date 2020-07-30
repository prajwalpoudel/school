@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Driver'" :table-id="'driver'" :theads="['First Name', 'Last Name','Phone Number', 'Email', 'Address', 'Salary', 'Licence Number', 'Action']" :button="['route' => 'admin.driver.create', 'name' => 'Create', 'icon' => 'la la-plus']" :url="'/admin/driver/list'" columns="[{ data: 'first_name', name: 'users.first_name' }, { data: 'last_name', name: 'users.last_name' },{ data: 'phone', name: 'user_details.phone' }, { data: 'email', name: 'users.email' }, { data: 'address', name: 'user_details.address' },  { data: 'salary', name: 'salary' }, { data: 'licence_number', name: 'licence_number' }, { data: 'action', name: 'action', orderable: false, searchable: false }]">
        </x-tables.datatable>
    </div>
@endsection
