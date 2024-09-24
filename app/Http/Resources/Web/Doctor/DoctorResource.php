<?php

namespace App\Http\Resources\Web\Doctor;

use App\Http\Resources\Web\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => url($this->image),
            'is_in_the_main_hub' => $this->is_in_the_main_hub,
            'category' => new CategoryResource($this->category),
        ];
    }
}
