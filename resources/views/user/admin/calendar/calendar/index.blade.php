@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="m-portlet" id="m_portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon">
                                    <i class="flaticon-map-location"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    Calendar
                                </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <a href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
                                        <span>
                                            <i class="la la-plus"></i>
                                            <span>Add Event</span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div id="calendar"></div>
                    </div>
                </div>

                <!--end::Portlet-->
            </div>
        </div>
    </div>
    @include('user.admin.calendar.calendar.event.eventModal')
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            var calendar = $('#calendar').fullCalendar({
                dayClick: function(date) {
                    $('#event-modal').modal();
                },
                events: [
                    {
                        title  : 'Class',
                        start  : '2020-07-05',
                    },
                    {
                        title  : 'Class',
                        start  : '2020-07-06',
                    },
                    {
                        title  : 'Class',
                        start  : '2020-07-07',
                    },
                    {
                        title  : 'Class',
                        start  : '2020-07-08',
                    },
                    {
                        title  : 'Class',
                        start  : '2020-07-09',
                        allDay: true
                    },
                    {
                        title  : 'Class',
                        start  : '2020-07-10',
                    },
                    {
                        title  : 'Holiday',
                        start  : '2020-07-11',
                    },

                    ],
                color: 'yellow',   // an option!
                textColor: 'black', // an option!
                eventLimit: 4,
            });
        })
    </script>
@endpush

