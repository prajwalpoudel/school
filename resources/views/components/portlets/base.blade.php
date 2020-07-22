<div class="m-portlet {{ $portletClass ?? '' }}">
    @if($headTitle)
        <div class="m-portlet__head {{ $headClass ?? '' }}">
            <div class="m-portlet__head-caption {{ $headCaptionClass ?? ''}}">
                <div class="m-portlet__head-title {{ $headTitleClass ?? '' }}">
                    @if($headIcon)
                        <span class="m-portlet__head-icon {{ $headIconClass ?? '' }}">
                            <i class="{{ $headIcon }}"></i>
                        </span>
                    @endif
                    <h3 class="m-portlet__head-text {{ $headTitleTextClass ?? '' }}">
                        {{ $headTitle }}
                    </h3>
                </div>
            </div>
        </div>
    @endif
    @if($form)
        @if($model)
            {!!  Form::model($model, ['route' => [$formAction, $model->id], 'class' => 'm-form m-form--fit m-form--label-align-right'. $formClass, 'method' => $formMethod]) !!}
        @else
            {!!  Form::open(['route' => $formAction, 'class' => 'm-form m-form--fit m-form--label-align-right'. $formClass, 'method' => $formMethod]) !!}
        @endif
        @csrf
    @endif
    @if($content)
        <div class="m-portlet__body {{ $bodyClass ?? ''}}">
            {{ $content }}
        </div>
    @endif
    @if($footer)
        <div class="m-portlet__foot {{ $footerClass }}">
            {{ $footer }}
        </div>
    @endif
    @if($form)
        {!! Form::close() !!}
    @endif
</div>
