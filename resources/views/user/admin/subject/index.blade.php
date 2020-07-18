@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Subject'" :table-id="'subject'" :theads="['ID', 'Subject', 'Grade', 'Author', 'Publication', 'Edition', 'Price', 'Action']" :button="['route' => 'admin.subject.create', 'name' => 'Create', 'icon' => 'la la-plus']" :url="'/admin/subject/list'" columns="[{ data: 'id', name: 'id' }, { data: 'name', name: 'name' }, { data: 'grade', name: 'grade' }, { data: 'author', name: 'author' }, { data: 'publication', name: 'publication' }, { data: 'edition', name: 'edition' }, { data: 'price', name: 'price' }, { data: 'action', name: 'action', orderable: false, searchable: false }]"></x-tables.datatable>
    </div>
@endsection
