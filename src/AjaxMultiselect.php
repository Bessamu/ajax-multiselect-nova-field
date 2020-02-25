<?php

namespace Bessamu\AjaxMultiselectNovaField;

use Laravel\Nova\Fields\Field;

class AjaxMultiselect extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'ajax-multiselect-field';
}
