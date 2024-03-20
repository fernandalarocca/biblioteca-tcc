<?php

namespace App\Actions\Restock;

use App\Models\Restock;

class CreateRestockAction
{
    public function execute(array $data): Restock
    {
        return app(Restock::class)->create($data);
    }
}
