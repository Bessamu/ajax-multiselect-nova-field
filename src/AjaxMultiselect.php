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
    public $component = 'ajax-multiselect';

    /**
     * Set search model by label.
     *
     * @param string $modelClass
     * @param string $searchLabel
     * @return $this
     */
    public function model(string $modelClass, string $searchLabel = 'name')
    {
        return $this->withMeta(['modelClass' => $modelClass, 'searchLabel' => $searchLabel]);
    }

    public function modelIdColumn(string $column)
    {
        return $this->withMeta(['modelIdColumn' => $column]);
    }

    public function maxOptions(int $max)
    {
        return $this->withMeta(['max' => $max]);
    }

    public function placeholder($placeholder)
    {
        return $this->withMeta(['placeholder' => $placeholder]);
    }
}
