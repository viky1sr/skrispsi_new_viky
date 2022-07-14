<?php

namespace App\HomeCare\MasterSpa\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MasterSpaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'Id' => $this->id,
            'NameSpa' => $this->name,
            'Price' => 'Rp. '.rupiah($this->price)
        ];
    }
}
