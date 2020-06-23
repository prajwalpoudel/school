@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Email Template'" :table-id="'email_template'" :theads="['ID', 'Title', 'Subject', 'Content', 'From', 'Action']" :button="['route' => 'admin.email_template.create', 'name' => 'Create', 'icon' => 'la la-plus']" :url="'/admin/email_template/list'" columns="[{ data: 'id', name: 'id' }, { data: 'title', name: 'title' }, { data: 'subject', name: 'subject' }, { data: 'content', name: 'content' }, { data: 'email_from', name: 'email_from' }, { data: 'action', name: 'action', orderable: false, searchable: false }]"></x-tables.datatable>
    </div>
@endsection
