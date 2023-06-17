<?php

namespace App\Http\Resources\Dashboard\Admin\Profile;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'email'         => $this->email,
            'phone'         => $this->phone,
            'lang'          => $this->lang,
            'created_at'    => $this->created_at->format("d-m-Y h:i A")
        ];
    }
}
