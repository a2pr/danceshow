<?php

namespace App\Http\Controllers;

use App\Facades\PackageDefinitionFacade;
use App\Models\PackageDefinition;
use App\ViewModels\StudentPackageViewModel;
use Illuminate\Http\Request;

class PackagesDefinitionController extends Controller
{
    private $facade;

    public function __construct()
    {
        $this->facade = new PackageDefinitionFacade();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packageDefinitions = PackageDefinition::all();
        $packageDefinitionStats = $this->facade->getPackageDefinitionStats();

        return view('package/definition/index', compact('packageDefinitions', 'packageDefinitionStats'));
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
        PackageDefinition::create($request->all());

        return redirect()->route('package-definition.index')->with('success', 'Package definition created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PackageDefinition $packageDefinition)
    {
        return view('package/definition/show', compact('packageDefinition'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PackageDefinition $packageDefinition)
    {
        return view('package/definition/edit', compact('packageDefinition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PackageDefinition $packageDefinition)
    {
        $data = $request->validate( [
            'package_amount' => 'required_without_all:package_duration',
            'package_duration' => 'required_without_all:package_amount',
            'type'=>'required|string',
            'name'=>'required|string',
            'description'=>'required|string'
        ]);

        $packageDefinition->update($data);

        return redirect()->route('package-definition.show', $packageDefinition)->with('success', 'Package definition updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PackageDefinition $packageDefinition)
    {
        $packageDefinition->delete();
        return redirect()->route('package-definition.index')->with('success', 'Package definition deleted successfully');
    }
}
