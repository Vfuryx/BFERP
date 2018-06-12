<?php

namespace App\Transformers;

use App\Models\MarkColor;
use League\Fractal\TransformerAbstract;

class MarkColorTransformer extends TransformerAbstract
{
    public function transform(MarkColor $markcolor)
    {
        return [
            'id' => $markcolor->id,
            'code' => $markcolor->code,
            'name' => $markcolor->name,
            'color' => $markcolor->color,
            'description' => $markcolor->description,
            'status' => $markcolor->status,
            'created_at' => $markcolor->created_at->toDateTimeString(),
            'updated_at' => $markcolor->updated_at->toDateTimeString(),
        ];
    }
}