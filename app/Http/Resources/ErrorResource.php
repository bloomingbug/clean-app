<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ErrorResource extends JsonResource
{
    public function __construct(private bool $status, private string $message, private int $code = 400)
    {
        parent::__construct($this->resource);
    }

    public function toArray(Request $request): array
    {
        return [
            'success' => $this->status,
            'code' => $this->code,
            'message' => $this->message,
            'data' => null,
        ];
    }

    public function withResponse($request, $response)
    {
        $response->setStatusCode($this->code);
    }
}
