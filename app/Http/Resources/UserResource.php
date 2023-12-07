<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if (!isset($this->id)) {
            abort(Response::HTTP_NOT_FOUND);
        }

        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'surname' => $this->surname,
        ];
    }
}
