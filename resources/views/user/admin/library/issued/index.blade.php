@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Issued Books'" :table-id="'issued'" :theads="['ID', 'Name', 'Role', 'Book Name', 'Book Code', 'Book Category', 'Issued On', 'Issued By', 'Action']" :button="['route' => 'admin.library.issue.book.create', 'name' => 'Issue', 'icon' => 'la la-plus']" :url="'/admin/library/issued/list'" columns="[{ data: 'id', name: 'id' }, { data: 'issuable.user.first_name', name: 'student' }, { data: 'issuable.user.role.display_name', name: 'role' }, { data: 'book.name', name: 'book' }, { data: 'book.code', name: 'code' }, { data: 'book.category.name', name: 'category' }, { data: 'created_at', name: 'created_at' }, { data: 'created_at', name: 'issued_by' }, { data: 'action', name: 'action', orderable: false, searchable: false }]"></x-tables.datatable>
    </div>
@endsection
