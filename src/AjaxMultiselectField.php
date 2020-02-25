<?php

namespace Bessamu\AjaxMultiselectField;

use Laravel\Nova\Fields\Field;

class AjaxMultiselectField extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'ajax-multiselect-field';
}
