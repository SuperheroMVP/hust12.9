<div class="form-group @if ($errors->has($name)) has-error @endif" style="margin-left: 18px;">
    <b>@if(isset($options['label']))
            {{$options['label']}}
        @endif
    </b>

    <div class="multi-choices-widget list-item-checkbox">
        <br>
        @if(isset($options['choices']) && (is_array($options['choices']) || $options['choices'] instanceof \Illuminate\Support\Collection))
            @include('plugins/blog::categories.categories-checkbox-option-line', [
                'categories' => $options['choices'],
                'value' => $options['value'],
                'currentId' => null,
                'name' => $name
            ])
        @endif
    </div>
</div>
