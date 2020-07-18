@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <div class="m-content">
            <x-portlets.base portlet-class="col-md-12" footer-class="m-portlet__foot--fit">
                <x-slot name="headTitle">Grade Detail</x-slot>
                <x-slot name="content">
                    <x-basic.accordion.accordion
                        parent-id="gradeaccordion"
                    >
                        <x-slot name="content">
                            @include('user.admin.grade.details.basic', ['grade' => $grade])
                            @include('user.admin.grade.details.section', ['sections' => $grade->sections])
                            @include('user.admin.grade.details.subject', ['subjects' => $grade->subjects])
                        </x-slot>
                    </x-basic.accordion.accordion>
                </x-slot>
                <x-slot name="footer">
                </x-slot>
            </x-portlets.base>
        </div>
    </div>
@endsection
