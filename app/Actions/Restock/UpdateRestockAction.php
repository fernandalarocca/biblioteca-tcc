<?php

namespace App\Actions\Restock;

use App\Http\Resources\RestockResource;
use App\Models\Restock;

class UpdateRestockAction
{
    public function execute(array $data, Restock $restock): RestockResource
    {
        $restock->update($data);
        return RestockResource::make($restock);
    }
}
