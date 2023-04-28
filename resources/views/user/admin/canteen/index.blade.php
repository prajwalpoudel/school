@extends('user.admin.layouts.master')

@section('breadcrumbs', $breadcrumbs)

@section('content')
    <div class="m-content">
        <x-tables.datatable
            :title="'canteen'"
            :table-id="'canteen'"
            :theads="['ID', 'Items', 'Price', 'Action']"
            :button="['route' => 'admin.canteen.create', 'name' => 'Create', 'icon' => 'la la-plus']"
            :url="'/admin/canteen/list'"
            :columns="[
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'price', name: 'price' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]"
        />
    </div>
@endsection
