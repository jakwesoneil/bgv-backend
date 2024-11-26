<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Services\LecturesService;
use App\Http\Requests\Laboratories\CreateLabRequest;
use App\Http\Requests\Laboratories\UpdateLabRequest;

class LecturesController extends Controller
{
    public function __construct(
        private readonly LecturesService $service
    )
    {}

    public function getListByTeacher($teacherId)
    {
        $result = $this->service->getListByTeacher($teacherId);

        return response()->json($result, Response::HTTP_OK);
    }

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
    public function store(CreateLabRequest $request) : JsonResponse
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
    public function update(UpdateLabRequest $request, string $id) : JsonResponse
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

    /**
     * Update existing record module file.
     */
    public function updateModule(Request $request, $id)
    {
        $result = $this->service->updateModule($request->file('module'), $id);

        return response()->json($result, Response::HTTP_OK);
    }
}
