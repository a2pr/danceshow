<?php

namespace App\Http\Controllers;

use App\Models\Package;
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
        foreach ($packages as $el){
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
