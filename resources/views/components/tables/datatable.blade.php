<div class="m-portlet">
    @if($title)
        <div class="m-portlet__head">
            <div class="m-portlet__head-wrapper">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            {{ $title }}
                        </h3>
                    </div>
                </div>
                @if($button)
                    <div class="m-portlet__head-tools">
                        <a href="{{ route($button['route']) }}"
                           class="btn btn-primary m-btn m-btn--icon m-btn--wide m-btn--md m--margin-right-10">
                            <span>
                                <i class="{{ $button['icon'] }}"></i>
                                <span>{{ $button['name'] }}</span>
                            </span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    @endif
    <div class="m-portlet__body">
        @if($contentHeader)
            {{ $contentHeader }}
        @endif

    <!--begin::Section-->
        <div class="m-section">
            <div class="m-section__content">
                <table class="table table-bordered table-hover {{ $tableClass }}" id="{{ $tableId }}">
                    <thead>
                    <tr>
                        @foreach($theads as $thead)
                            <th>{{ $thead }}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

        <!--end::Section-->
    </div>

    <!--end::Form-->
</div>

@push('script')
    <script>
        $(document).ready(function() {
            var id = {!! json_encode($tableId)  !!}
            var columns =
                {!! $columns  !!}
            var url = {!! json_encode($url) !!}

            $('#' + id).DataTable({
                processing: true,
                serverSide: true,
                ajax: url,
                columns: columns,
            });
        })
    </script>
@endpush
