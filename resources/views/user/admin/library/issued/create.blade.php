@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-portlets.base portlet-class="col-md-12" footer-class="m-portlet__foot--fit">
            <x-slot name="headTitle">Issue Book</x-slot>
            <x-slot name="content">
                <div class="form-group m-form__group row">
                    <x-inputs.text form-class="col-lg-12" label="Role" labelfor="name" name="name" type="text"></x-inputs.text>
                </div>
                <div class="form-group m-form__group row">
                    <x-inputs.text form-class="col-lg-12" label="Student Name / ID" labelfor="name" name="name" type="text"></x-inputs.text>
                </div>
                <div class="row">
                    <table class="table">
                        <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Jhon</td>
                            <td>Stone</td>
                            <td>@jhon</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Lisa</td>
                            <td>Nilson</td>
                            <td>@lisa</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="form-group m-form__group row">
                    <x-inputs.text form-class="col-lg-12" label="Book ID" labelfor="name" name="name" type="text"></x-inputs.text>
                </div>
            </x-slot>
        </x-portlets.base>
    </div>
@endsection
