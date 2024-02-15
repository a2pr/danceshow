<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\PackageCreateDto;
use App\DataTransferObjects\PackageDefinitionCreateDto;
use App\DataTransferObjects\StudentDto;
use App\Models\Package;
use App\Models\PackageDefinition;
use App\Models\Student;
use App\ViewModels\StudentPackageViewModel;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    /**
     * Display a listing of packages and their student
     */
    public function index()
    {
        $packages = Package::all();
        $viewModels = [];
        foreach ($packages as $el) {
            $viewModel = new StudentPackageViewModel(
                $el->student()->first()->name,
                $el->packageDefinition()->first()->type,
                $el->start_date,
                $el->end_date,
                $el->remaining_amount,
                $el->active,
            );
            $viewModels[] = $viewModel;
        }

        return view('package/student-package', compact('viewModels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Student $student)
    {
        // add retriction to multiple packages
        $packageDefinitions = PackageDefinition::all();
        $packageDefinitionCreateDto = array_map(function ($element) {
            return new PackageDefinitionCreateDto($element['id'], $element['type'], $element['name'], $element['package_amount'], $element['package_duration'],);
        }, $packageDefinitions->toArray());

        $packageCreateDto = new PackageCreateDto(new StudentDto($student->id, $student->name), $packageDefinitionCreateDto);

        return view('package/create', compact('packageCreateDto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'package_definition_id' => 'required'
        ]);

        $data = $request->all();

        $packageDefinition = PackageDefinition::find($data['package_definition_id']);

        $newPackage = new Package();
        $newPackage->student_id = $data['student_id'];
        $newPackage->package_definition_id = $data['package_definition_id'];
        if ($packageDefinition->type == 'amount') {
            $newPackage->remaining_amount = $packageDefinition->package_amount;
        } else {
            $date = new \DateTime();
            $interval = new \DateInterval($packageDefinition->package_duration);
            $end_date = $date->add($interval);

            $newPackage->start_date = $date;
            $newPackage->end_date = $end_date;
        }

        $newPackage->save();

        return redirect()->route('package.index')->with('success', 'Package created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        dd($package);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Package $package)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        //
    }
}
