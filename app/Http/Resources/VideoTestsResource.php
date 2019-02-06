<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoTestsResource extends JsonResource
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
	'id'  => $this->id,
	'video_id' => $this->video_id,
	'version' => $this->version,
	'language_code'=> $this->language_code,
	'created_at' => (string) $this->created_at,
	'updated_at' => (string) $this->updated_at,
	];
	//return parent::toArray($request);
    }
}
