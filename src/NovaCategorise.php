<?php

namespace AlexBowers\NovaCategoriseResources;

use App\Nova\Resource;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Laravel\Nova\Nova;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Illuminate\Support\Str;
use Symfony\Component\Finder\Finder;

class NovaCategorise extends Nova
{


    public static function availableResourcesGrouped(Request $request)
    {
        $resources = collect(static::availableResources($request))
            ->filter(function ($resource) {
                return $resource::$displayInNavigation;
            })->transform(function ($resource) {
                return self::getGroupData($resource);
            });

//        $resources = self::mergeFrcActinResources($resources);

        return collect([
            'resources' => $resources->sortKeys(),
        ]);
    }

    /**
     * @param $resource
     * @return array
     * @throws \ReflectionException
     */
    private static function getGroupData($resource): array
    {
        return [
            'name' => $resource,
            'grouping' => $grouping = Str::of((new \ReflectionClass($resource))->getNamespaceName())
                ->explode('App\Nova')->transform(fn($str) => Str::of($str))
                ->last()->explode('\\')->filter(),
            'indent' => $grouping->count(),
            'uriKey' => $resource::uriKey(),
            'label' => $resource::label(),
        ];
    }

//    private static function mergeFrcActinResources(Collection $resources)
//    {
//        foreach ($resources as $resource) {
//            if (str::contains($resource['name'], 'Nova\Frc\\')) {
//                $name = Str::of($resource['name'])->replace('Frc\\', 'FrcAction\\');
//
//                $resources->push(self::getGroupData("$name"));
//            }
//        }
//
//        return $resources;
//    }
}
