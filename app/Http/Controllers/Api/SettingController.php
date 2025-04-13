<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use ApiResponse;
    
    public function index()
    {
        return $this->successResponse(
            Setting::all(),
            "Fetched all settings successfully"
        );
    }

    public function show($id)
    {
        $setting = Setting::find($id);

        if (!$setting) {
            return $this->errorResponse(
                "Setting not found",
                404
            );
        }

        return $this->successResponse(
            $setting,
            "Fetched setting successfully"
        );
    }

    public function store(StoreSettingRequest $request)
    {
        $setting = Setting::create($request->validated());

        return $this->successResponse(
            $setting,
            "Created new setting successfully"
        );
    }

    public function update(UpdateSettingRequest $request, $id)
    {
        $setting = Setting::find($id);

        if (!$setting) {
            return $this->errorResponse(
                "Setting not found",
                404
            );
        }

        $setting->update($request->validated());

        return $this->successResponse(
            $setting,
            "Updated setting successfully"
        );
    }

    public function destroy($id)
    {
        $setting = Setting::find($id);

        if (!$setting) {
            return $this->errorResponse(
                "Setting not found",
                404
            );
        }

        $setting->delete();

        return $this->successResponse(
            null,
            "Deleted setting successfully"
        );
    }
}
