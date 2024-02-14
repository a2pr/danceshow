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

        return view('package/define', compact('packageDefinitions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
