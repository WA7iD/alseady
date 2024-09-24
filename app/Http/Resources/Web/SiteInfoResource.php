<?php

namespace App\Http\Resources\Web;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiteInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'sliders' => SliderResource::collection(Slider::active()->get()),
            'name' => $this->name,
            'logo' => url('/') . '/' . $this->logo,
            'logo_footer' => url('/') . '/' . $this->logo_footer,
            'fav_icon' => url('/') . '/' . $this->fav_icon,
            'email' => $this->email,
            'phone' => $this->phone,
            'whatsapp_phone' => $this->whatsapp_phone,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
        ];
    }
}
