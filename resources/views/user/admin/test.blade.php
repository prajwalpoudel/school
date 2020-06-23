@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Student'" :table-id="'role'" :theads="['Name', 'Action']" :button="['route' => 'test', 'name' => 'Create', 'icon' => 'la la-plus']" :url="'/testData'" columns="[{ data: 'name', name: 'name' } , { data: 'action', name: 'action', orderable: false, searchable: false }]"></x-tables.datatable>
    </div>
@endsection
