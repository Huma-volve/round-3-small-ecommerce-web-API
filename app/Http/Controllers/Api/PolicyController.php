<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePolicyRequest;
use App\Http\Requests\UpdatePolicyRequest;
use App\Models\Policy;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filters = request()->only(['policy_type', 'is_active']);
        $policies = Policy::filter($filters)->get();

        return $this->successResponse(
            $policies,
            $filters ? "Filtered policies list" : "Fetched policies list"
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePolicyRequest $request)
    {
        $policy = Policy::create($request->validated());

        return $this->successResponse(
            $policy,
            "Policy created successfully"
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Policy $policy)
    {
        $policy = Policy::find($policy->id);

        if (!$policy) {
            return $this->errorResponse(
                "Policy not found",
                404
            );
        }

        return $this->successResponse(
            $policy,
            "Fetched policy successfully"
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePolicyRequest $request, Policy $policy)
    {
        $policy = Policy::find($policy->id);

        if (!$policy) {
            return $this->errorResponse(
                "Policy not found",
                404
            );
        }

        $policy->update($request->validated());

        return $this->successResponse(
            $policy,
            "Policy updated successfully"
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Policy $policy)
    {
        $policy = Policy::find($policy->id);

        if (!$policy) {
            return $this->errorResponse(
                "Policy not found",
                404
            );
        }

        $policy->delete();

        return $this->successResponse(
            $policy,
            "Policy deleted successfully"
        );
    }
}
