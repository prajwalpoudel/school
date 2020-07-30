@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-tables.datatable
            :title="'Installment'"
            :table-id="'installment'"
            :theads="[
                        'ID',
                        'Name',
                        'Fee Category',
                        'Published Status',
                        'Action'
                      ]"
            :button="[
                        'route' => 'admin.installment.create',
                        'name' => 'Create',
                        'icon' => 'la la-plus'
                     ]"
            :url="'/admin/installment/list'"
            columns="[
                        { data: 'id', name: 'id' },
                        { data: 'name', name: 'name' },
                        { data: 'fee_category', name: 'fee_category' },
                        { data: 'status', name: 'status' },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                     ]">

        </x-tables.datatable>
    </div>
@endsection
