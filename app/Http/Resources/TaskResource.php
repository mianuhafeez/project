<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'due_date' => Carbon::parse($this->due_date)->format('M d-Y'),
            'priority' => $this->priority,
            'team' => $this->team,
            'avatar' => $this->avatar,
            'image' => $this->image,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d H:i:s'),
        ];
    }
}
