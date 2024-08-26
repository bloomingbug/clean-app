<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SuccessResource extends JsonResource
{
    public function __construct(private bool $status, private string $message, $resource, private int $code = 200)
    {
        parent::__construct($resource);
    }

    public function toArray(Request $request): array
    {
        return [
            'success' => $this->status,
            'code' => $this->code,
            'message' => $this->message,
            'data' => $this->resource,
        ];
    }

    public function withResponse($request, $response)
    {
        $response->setStatusCode($this->code);
    }
}
