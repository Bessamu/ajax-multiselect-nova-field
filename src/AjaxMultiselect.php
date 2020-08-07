<?php

namespace Bessamu\AjaxMultiselectNovaField;

use Closure;
use Illuminate\Database\Eloquent\Builder;
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
     * @var string
     */
    private $modelClass = '';

    /**
     * Set search model.
     *
     * @param string $modelClass
     * @return $this
     */
    public function optionsModel(string $modelClass)
    {
        $this->modelClass = $modelClass;
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

    public function filter(Closure $callback)
    {
        $callback($query = $this->modelClass::query());

        return $this->withMeta(['filter' => $query->toSql()]);
    }

    public function placeholder($placeholder)
    {
        return $this->withMeta(['placeholder' => $placeholder]);
    }
}
