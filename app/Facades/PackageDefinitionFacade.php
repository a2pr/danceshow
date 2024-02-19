<?php

namespace App\Facades;

use App\Models\Package;
use App\Models\PackageDefinition;

class PackageDefinitionFacade
{
    public function getPackageDefinitionStats(): array
    {
        return [
            'packages' => $this->getAmountOfPackages(),
            'count_interval_packages' => $this->getPackageIntervalTypeCount(),
            'count_amount_packages' => $this->getPackageAmountTypeCount(),
        ];
    }

    /**
     * @return array|mixed
     */
    private function getAmountOfPackages(): mixed
    {
        $packageDefinition = PackageDefinition::all();
        $result = [];
        foreach ($packageDefinition as $el) {
            $count = Package::where('package_definition_id', $el->id)->count();
            $result = array_merge($result, [$el->name => ['count' => $count, 'type' => $el->type]]);
        }
        return $result;
    }

    private function getPackageAmountTypeCount()
    {
        return Package::join('package_definitions', function ($join) {
            $join->on('packages.package_definition_id', '=', 'package_definitions.id')
                ->where('package_definitions.type', '=', Package::AMOUNT_TYPE);
        })->select('packages.*')
            ->count();
    }

    private function getPackageIntervalTypeCount()
    {
        return Package::join('package_definitions', function ($join) {
            $join->on('packages.package_definition_id', '=', 'package_definitions.id')
                ->where('package_definitions.type', '=', Package::INTERVAL_TYPE);
        })->select('packages.*')
            ->count();
    }
}
