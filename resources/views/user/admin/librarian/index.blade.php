@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Librarian'" :table-id="'librarian'" :theads="['First Name', 'Last Name',  'Email', 'Phone Number', 'Address', 'Salary', 'Action']" :button="['route' => 'admin.librarian.create', 'name' => 'Create', 'icon' => 'la la-plus']" :url="'/admin/librarian/list'" columns="[{ data: 'first_name', name: 'users.first_name' }, { data: 'last_name', name: 'users.last_name' }, { data: 'email', name: 'users.email' }, { data: 'phone', name: 'user_details.phone' }, { data: 'address', name: 'user_details.address' },{ data: 'salary', name: 'salary' }, { data: 'action', name: 'action', orderable: false, searchable: false }]">
        </x-tables.datatable>
    </div>
@endsection
