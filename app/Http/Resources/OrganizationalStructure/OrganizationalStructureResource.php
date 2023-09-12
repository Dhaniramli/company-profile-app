<?php

namespace App\Http\Resources\OrganizationalStructure;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationalStructureResource extends JsonResource
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
            'image' => $this->image,
            'created_at' => date_format($this->created_at, "Y/m/d H:i:s"),
            // 'update_at' => date_format($this->update_at, "Y/m/d H:i:s"),
        ];
    }
}
