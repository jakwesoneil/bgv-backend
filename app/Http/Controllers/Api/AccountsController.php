<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Services\AccountsService;
use App\Http\Requests\Accounts\CreateAccountRequest;
use App\Http\Requests\Accounts\UpdateAccountRequest;

class AccountsController extends Controller
{
    public function __construct(
        private readonly AccountsService $accountsService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index($type) : JsonResponse
    {
        $accountType = $type;
        $result = $accountType ? $this->accountsService->getListByUserType($accountType) : $this->accountsService->getList();

        return response()->json($result, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAccountRequest $request)
    {
        $result = $this->accountsService->create($request->validated());

        return response()->json($result, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountRequest $request, string $id)
    {
        $result = $this->accountsService->updateById($id, $request->validated());

        return response()->json($result, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->accountsService->deleteById($id);

        return response()->json($result, 204);
    }
}
