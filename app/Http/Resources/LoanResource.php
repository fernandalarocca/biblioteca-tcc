<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'author' => AuthorResource::make($this->author),
            'book' => BookResource::make($this->book),
            'quantity' => $this->quantity,
            'clients_name' => $this->clients_name,
            'cpf' => $this->cpf,
            'phone' => $this->phone,
            'date_to_return_book' => $this->date_to_return_book,
            'created_at' => $this->created_at->format('d/m/Y H:i'),
            'updated_at' => $this->updated_at->format('d/m/Y H:i')
        ];
    }
}
