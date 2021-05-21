<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Str;

class ArticleCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'article_id' => $this->id,
            'title' => Str::limit($this->title, 20),
            'title_full' => $this->title,
            'slug' => $this->slug,
            'visit' => $this->visit,
            'visibility' => $this->visibility,
            'summary' => Str::limit($this->summary, 20),
            'edit_url' => route("career.edit", $this->id),
            'created_at' => Carbon::parse($this->created_at)->isoFormat('DD/MM/YYYY [at] HH:mm'),
            'updated_at' => Carbon::parse($this->updated_at)->isoFormat('DD/MM/YYYY [at] HH:mm')
        ];
    }
}
