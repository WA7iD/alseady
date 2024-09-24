<?php

namespace App\Http\Resources\Web\Activity;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
   public function toArray(Request $request): array
{
    $images = $this->images;

    // Check if $images is null or not a collection
    if (is_null($images) || !$images instanceof \Illuminate\Database\Eloquent\Collection) {
        // Log or dd($images) for debugging
        \Log::debug('Images data:', [$images]);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'images' => [],
        ];
    }

    return [
        'id' => $this->id,
        'title' => $this->title,
        'description' => $this->description,
        'images' => ActivityImageResource::collection($images),
    ];
}
}
