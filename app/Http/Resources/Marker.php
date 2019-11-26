<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Marker extends JsonResource
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
            'id' => $this->id,
            'filename' => $this->filename,
            'lat' => $this->lat,
            'lon' => $this->lon,
            'title' => $this->title,
            'desc' => $this->desc,
            'addr' => $this->addr,
            'isVerified' => $this->isVerified,
        ];
    }
}
