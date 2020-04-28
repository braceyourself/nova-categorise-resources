<?php namespace AlexBowers\NovaCategoriseResources;

use Laravel\Nova\Nova;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NovaCategorise extends Nova
{
    public static function availableResourcesGrouped(Request $request)
    {
        return [
            'resources' => collect(static::availableResources($request))
                ->filter(fn($resource) => $resource::$displayInNavigation)
                ->transform(function ($resource) {
                    return [
                        'name' => $resource,
                        'test' => 'test',
                        'grouping' => $grouping = Str::of((new \ReflectionClass($resource))->getNamespaceName())
                            ->explode('App\Nova')->transform(fn($str) => Str::of($str))
                            ->last()->explode('\\')->filter(),
                        'indent' => $grouping->count(),
                        'uriKey' => $resource::uriKey(),
                        'label' => $resource::label(),
                    ];
                })
        ];
    }
}
