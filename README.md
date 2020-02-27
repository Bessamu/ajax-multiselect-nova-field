# Ajax Multiselect Nova Field
Laravel Nova package add vue-multiselect field work with ajax requests. Field values save as json string.
  
![](docs/ajax-request.gif)

## Getting Started
### Installing

Install the package in a project via composer:

```bash
composer require bessamu/ajax-multiselect-nova-field
```

### Usage

Ajax multiselect field have a `model` option for searching by ajax queries.

```php
<?php

namespace App\Nova;

use App\Models\Catalog\Product;
use Bessamu\AjaxMultiselectNovaField\AjaxMultiselect;

class NewsResource extends Resource
{
    public function fields(Request $request)
    {
        return [
        AjaxMultiselect::make('Products', 'products')
            ->model(Product::class, 'model')
            ->placeholder('Select products')
            ->maxOptions(5)
        ];
    }
}
```
Option `model` required for a nova field:

- First parameter is model class must be extended by `Illuminate\Database\Eloquent\Model`. 
- Second parameter is label for searching model (`'name'` by default).

Values saved as json string in a column.

#### All options

| option                        | parameters                               | values           |
| ----------------------------- | ---------------------------------------- | ---------------- |
| `model`                       | string $modelClass, string $searchLabel  | required, 'name' |
| `placeholder`                 | string $placeholder                      | required         |
| `maxOptions`                  | int $max                                 | required         |


## Authors

* **Korotkov Pavel** - *Initial work* - [Bessamu](https://github.com/Bessamu)

See also the list of [contributors](https://github.com/Bessamu/ajax-multiselect-nova-field/graphs/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
