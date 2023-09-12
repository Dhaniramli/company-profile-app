<?php

namespace App\Http\Resources\StructuralOfficial;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StructuralOfficialResource extends JsonResource
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
            'position' => $this->position,
            'number' => $this->number,
            'image' => $this->image,
            'created_at' => date_format($this->created_at, "Y/m/d H:i:s"),
            // 'update_at' => date_format($this->update_at, "Y/m/d H:i:s"),
        ];
    }
}
