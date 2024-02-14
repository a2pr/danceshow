<?php

namespace App\Http\Controllers;

use App\Models\PackageDefinition;
use App\ViewModels\StudentPackageViewModel;
use Illuminate\Http\Request;

class PackagesDefinitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packageDefinitions = PackageDefinition::all();

        return view('package/definition/index', compact('packageDefinitions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('package/definition/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'package_amount' => 'required_without_all:package_duration',
                'package_duration' => 'required_without_all:package_amount',
                'type'=>'required|string',
                'name'=>'required|string',
                'description'=>'required|string'
            ]
        );
        $packageDefinition = PackageDefinition::create($request->all());

        return redirect()->route('package-definition.index')->with('success', 'Package definition created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PackageDefinition $packageDefinition)
    {
        dd($packageDefinition);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PackageDefinition $packageDefinition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PackageDefinition $packageDefinition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PackageDefinition $packageDefinition)
    {
        //
    }
}
