<?php

namespace Bessamu\AjaxMultiselectNovaField\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;
use Laravel\Nova\Http\Requests\NovaRequest;

class AjaxMultiselectController extends Controller
{
    private const DEFAULT_LIMIT = 20;

    public function getOptionsByQuery(NovaRequest $request)
    {
        $query = $request->input('query');
        $label = $request->input('label');
        /** @var Builder $builder */
        $builder = ($request->input('class'))::query();

        $builder->where($label, 'like', "%$query%");
        $builder->limit($request->input('limit') ?? self::DEFAULT_LIMIT);

        return response()->json($this->serializeModels($builder->get(), $label));
    }

    public function getOptions(NovaRequest $request)
    {
        $label = $request->input('label');
        $items = ($request->input('class'))::findOrFail($request->input('value'));

        $items = $this->serializeModels($items, $label);

        return response()->json($items);
    }

    private function serializeModels(Collection $models, string $label)
    {
        return $models->map(function ($model) use ($label) {
            return [
                'label' => $model->$label,
                'value' => $model->id
            ];
        });
    }
}
