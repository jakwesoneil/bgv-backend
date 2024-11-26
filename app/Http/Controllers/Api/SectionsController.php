<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Services\SectionsService;
use App\Http\Requests\Sections\CreateSectionRequest;
use App\Http\Requests\Sections\UpdateSectionRequest;

class SectionsController extends Controller
{
    public function __construct(
        private readonly SectionsService $service
    )
    {}

    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        $result = $this->service->getList();

        return response()->json($result, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSectionRequest $request) : JsonResponse
    {
        $result = $this->service->create($request->validated());

        return response()->json($result, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) : JsonResponse
    {
        $result = $this->service->getById($id);

        return response()->json($result, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSectionRequest $request, string $id) : JsonResponse
    {
        $result = $this->service->updateById($id, $request->validated());

        return response()->json($result, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : JsonResponse
    {
        $result = $this->service->deleteById($id);

        return response()->json($result, Response::HTTP_NO_CONTENT);
    }
}
