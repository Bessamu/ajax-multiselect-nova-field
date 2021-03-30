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
     * Set search model.
     *
     * @param string $modelClass
     * @return $this
     */
    public function optionsModel(string $modelClass)
    {
        return $this->withMeta(['modelClass' => $modelClass]);
    }

    /**
     * Set label for searching and frontend output
     *
     * @param string $searchLabel
     * @return AjaxMultiselect
     */
    public function optionsLabel(string $searchLabel)
    {
        return $this->withMeta(['searchLabel' => $searchLabel]);
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

    public function queryWhere(string $column, $value, $operator = '=')
    {
        return $this->withMeta(['queryWhere' => $column . $operator . $value]);
    }

    public function orderBy(string $column, $direction = 'asc')
    {
        return $this->withMeta(['orderBy' => $column, 'orderDirection' => $direction]);
    }
}
