<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Testimonial;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use PHPUnit\Event\Code\Test;

class TestimonialsController extends Controller
{
    use ApiResponse;

    public function index(){
        return $this->successResponse(
            Testimonial::all(),
            'Testimonials fetched successfully'
        );
    }

    public function show($id){
        $testimonial = Testimonial::find($id);

        if (!$testimonial) {
            return $this->errorResponse("Testimonial not found", 404);
        }

        return $this->successResponse(
            $testimonial,
            "Fetched successfully"
        );
    }

    public function store(StoreTestimonialRequest $request){
        $testimonial = Testimonial::create($request->validated());

        return $this->successResponse(
            $testimonial,
            "Testimonial created successfully"
        );
    }

    public function update(UpdateTestimonialRequest $request, $id){
        $testimonial = Testimonial::find($id);

        if (!$testimonial) {
            return $this->errorResponse("Testimonial not found", 404);
        }

        $testimonial->update($request->validated());

        return $this->successResponse(
            $testimonial,
            "Testimonial updated successfully"
        );
    }

    public function destroy($id){
        $testimonial = Testimonial::find($id);

        if (!$testimonial) {
            return $this->errorResponse("Testimonial not found", 404);
        }

        $testimonial->delete();

        return $this->successResponse(
            null,
            "Testimonial deleted successfully"
        );
    }
}
