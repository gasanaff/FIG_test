<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

class StoreResource extends JsonResource
{
    public static $wrap = null;

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
            'user' => $this->user ? [
                'id' => $this->user->id,
                'first_name' => $this->user->first_name,
                'surname' => $this->user->surname,
            ] : null,
        ];
    }
}
