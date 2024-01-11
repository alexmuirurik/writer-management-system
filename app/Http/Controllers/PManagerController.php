<?php

namespace App\Http\Controllers;

use App\Models\PManager;
use App\Http\Requests\StorePManagerRequest;
use App\Http\Requests\UpdatePManagerRequest;

class PManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index');
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
    public function store(StorePManagerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PManager $pManager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PManager $pManager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePManagerRequest $request, PManager $pManager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PManager $pManager)
    {
        //
    }
}
