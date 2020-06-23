@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Books'" :table-id="'book'" :theads="['ID', 'Name', 'Category', 'Code', 'Publication', 'Edition', 'Author', 'Price', 'Action']" :button="['route' => 'admin.library.book.create', 'name' => 'Create', 'icon' => 'la la-plus']" :url="'/admin/library/book/list'" columns="[{ data: 'id', name: 'id' }, { data: 'name', name: 'name' }, { data: 'category', name: 'category' }, { data: 'code', name: 'code' }, { data: 'publication', name: 'publication' }, { data: 'edition', name: 'edition' }, { data: 'author', name: 'author' }, { data: 'price', name: 'price' }, { data: 'action', name: 'action', orderable: false, searchable: false }]"></x-tables.datatable>
    </div>
@endsection
