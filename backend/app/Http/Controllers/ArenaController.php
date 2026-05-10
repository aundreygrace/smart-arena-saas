<?php

namespace App\Http\Controllers;

use App\Models\Arena;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArenaRequest;
use App\Services\ArenaService;
use Illuminate\Http\RedirectResponse;

class ArenaController extends Controller
{

    public function __construct(
        protected ArenaService $arenaService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreArenaRequest $request): RedirectResponse
    {
        abort_if(!auth()->user()->hasRole('owner'), 403);

        $this->arenaService->create(
            $request->validated(),
            auth()->id()
        );

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Arena $arena)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Arena $arena)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Arena $arena)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Arena $arena)
    {
        //
    }
}
