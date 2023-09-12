<?php

namespace App\Http\Resources\Report;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
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
            'nik' => $this->nik,
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'title_report' => $this->title_report,
            'report' => $this->report,
            'image_report' => $this->image_report,
            'image_ktp' => $this->image_ktp,
            'status' => $this->status ? "Diproses" : "Selesai",
            'created_at' => date_format($this->created_at, "Y/m/d H:i:s"),
            // 'update_at' => date_format($this->update_at, "Y/m/d H:i:s"),
        ];
    }
}
