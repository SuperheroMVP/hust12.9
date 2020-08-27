<?php

namespace Botble\ACL\Forms\Fields;

use Kris\LaravelFormBuilder\Fields\FormField;

class CategoryMultiFieldCustomCheckbox extends FormField
{

    /**
     * @return string
     */
    protected function getTemplate()
    {
        return 'core/acl::customview.categories-multi-checkbox-custom';
    }
}
