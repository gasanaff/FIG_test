<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

class ProductWithUserOnlyResource extends JsonResource
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
            'title' => $this->title,
            'user' => $this->storeUser ? [
                'id' => $this->storeUser->id,
                'first_name' => $this->storeUser->first_name,
                'surname' => $this->storeUser->surname,
            ] : null,
        ];
    }
}
