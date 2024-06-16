<?php

namespace App\Http\Resources\CommunityProfile;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommunityProfileResource extends JsonResource
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
            'socialMedia' => $this->social_media,
            'logo' => $this->logo,
            'about' => $this->about,
        ];
    }
}
