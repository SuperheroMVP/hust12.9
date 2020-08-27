@extends('core/base::layouts.master')
@section('content')
    @if ($showStart)
        {!! Form::open(Arr::except($formOptions, ['template'])) !!}
    @endif

    @if ($form->getModuleName())
        @php
            do_action(BASE_ACTION_TOP_FORM_CONTENT_NOTIFICATION, $form->getModuleName(), request(), $form->getModel())
        @endphp
    @endif
    <div class="row">
        <div class="col-md-9">
            @if ($showFields && $form->hasMainFields())
                <div class="main-form">
                    <div class="{{ $form->getWrapperClass() }}">
                        @foreach ($fields as $key => $field)
                            @if ($field->getName() == $form->getBreakFieldPoint())
                                @break
                            @else
                                @unset($fields[$key])
                            @endif
                            @if (!in_array($field->getName(), $exclude))
                                {!! $field->render() !!}
                                @if ($field->getName() == 'name' && defined('BASE_FILTER_SLUG_AREA'))
                                    {!! apply_filters(BASE_FILTER_SLUG_AREA, $form->getModel()) !!}
                                @endif
                            @endif
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                </div>
            @endif

            @foreach ($form->getMetaBoxes() as $key => $metaBox)
                {!! $form->getMetaBox($key) !!}
            @endforeach

            @if ($form->getModuleName())
                @php do_action(BASE_ACTION_META_BOXES, $form->getModuleName(), 'advanced', $form->getModel()) @endphp
            @endif
        </div>
        <div class="col-md-3 right-sidebar">
            {!! $form->getActionButtons() !!}
            @if ($form->getModuleName())
                @php do_action(BASE_ACTION_META_BOXES, $form->getModuleName(), 'top', $form->getModel()) @endphp
            @endif

            @foreach ($fields as $field)
                @if (!in_array($field->getName(), $exclude))
                    <div class="widget meta-boxes">
                        <div class="widget-title">
                            <h4>{!! Form::customLabel($field->getName(), $field->getOption('label'), $field->getOption('label_attr')) !!}</h4>
                        </div>
                        <div class="widget-body">
                            {!! $field->render([], in_array($field->getType(), ['radio', 'checkbox'])) !!}
                        </div>
                    </div>
                @endif
            @endforeach

            @if ($form->getModuleName())
                @php do_action(BASE_ACTION_META_BOXES, $form->getModuleName(), 'side', $form->getModel()) @endphp
            @endif
        </div>
    </div>

    @if ($showEnd)
        {!! Form::close() !!}
    @endif

    @yield('form_end')
@stop

@if ($form->getValidatorClass())
    @if ($form->isUseInlineJs())
        {!! Assets::scriptToHtml('jquery') !!}
        {!! Assets::scriptToHtml('form-validation') !!}
        {!! $form->renderValidatorJs() !!}
    @else
        @push('footer')
            {!! $form->renderValidatorJs() !!}
        @endpush
    @endif
@endif
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>
    $(document).ready(function () {
        $("#add_img").button().click(function () {
            let html = `
                <div class="image-box">
                    <input type="hidden" name="image[]" value="" class="image-data">
                    <div class="preview-image-wrapper ">
                        <img src="/vendor/core/images/placeholder.png" alt="preview image" class="preview_image" width="150">
                        <a class="btn_remove_image" title="Xoá ảnh">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                    <div class="image-box-actions">
                        <a href="#" class="btn_gallery" data-result="image[]" data-action="select-image">
                            Chọn ảnh
                        </a>
                    </div>
                </div>
            `;
            console.log($('.image-data').closest('.form-group'));
            $('.image-data').closest('.form-group').append(html);
        });
    });
</script>