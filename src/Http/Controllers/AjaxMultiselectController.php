<?php

namespace Bessamu\AjaxMultiselectNovaField\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Routing\Controller;
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

        return response()->json($builder->get());
    }

    public function getOptions(NovaRequest $request)
    {
        $value = $this->serializeValues($request->input('value'), $request->input('id-column'));
        $items = ($request->input('class'))::findOrFail($value);

        return response()->json($items);
    }

    private function serializeValues(string $value, string $id)
    {
        $value = collect(json_decode($value));
        return $value->map(function ($item) use ($id) {
            return $item->$id;
        });
    }
}
