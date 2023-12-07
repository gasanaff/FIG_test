<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

class ProductResource extends JsonResource
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
            'store' => $this->store ? [
                'id' => $this->store->id,
                'title' => $this->store->title,
                'user' => $this->store->user ? [
                    'id' => $this->store->user->id,
                    'first_name' => $this->store->user->first_name,
                    'surname' => $this->store->user->surname,
                ] : null,
            ] : null,
        ];

//        return [
//            'id' => $this->id,
//            'title' => $this->title,
//            'user' => $this->storeUser ? [
//                'id' => $this->storeUser->id,
//                'first_name' => $this->storeUser->first_name,
//                'surname' => $this->storeUser->surname,
//            ] : null,
//        ];
    }
}
