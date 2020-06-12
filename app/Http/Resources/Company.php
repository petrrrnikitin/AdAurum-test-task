<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Company extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'company' => ['value' => $this->id, 'name' => 'Компания' ],
                'title' => [ 'value' => $this->title, 'name' => 'Название компании' ],
                'tax_id_number' => [ 'value' => $this->tax_id_number, 'name' => 'ИНН' ],
                'description' => [ 'value' => $this->description, 'name' => 'Общая информация' ],
                'owner' => [ 'value' => $this->owner, 'name' => 'Генеральный директор' ],
                'address' => [ 'value' => $this->address, 'name' => 'Адрес' ],
                'phone' => [ 'value' => $this->phone, 'name' => 'Телефон' ],
            ],
            'updated' => [
                'last_updated' => $this->updated_at->diffForHumans(),
            ],
            'links' => [
                'self' => $this->path(),
            ]
        ];
    }
}
