<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    use ApiResponse;

    public function index()
    {
        return $this->successResponse(
            Faq::all(),
            "Fetched all faqs successfully"
        );
    }

    public function show($id)
    {
        $faq = Faq::find($id);

        if (!$faq) {
            return $this->errorResponse(
                "Faq not found",
                404
            );
        }

        return $this->successResponse(
            $faq,
            "Fetched faq successfully"
        );
    }

    public function store(Request $request)
    {
        $faq = Faq::create($request->all());

        return $this->successResponse(
            $faq,
            "Faq created successfully"
        );
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::find($id);

        if (!$faq) {
            return $this->errorResponse(
                "Faq not found",
                404
            );
        }

        $faq->update($request->all());

        return $this->successResponse(
            $faq,
            "Faq updated successfully"
        );
    }

    public function destroy($id)
    {
        $faq = Faq::find($id);

        if (!$faq) {
            return $this->errorResponse(
                "Faq not found",
                404
            );
        }

        $faq->delete();

        return $this->successResponse(
            null,
            "Faq deleted successfully"
        );
    }
}
