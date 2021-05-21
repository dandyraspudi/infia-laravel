<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ApplicantCollection extends JsonResource
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
            'applicant_id' => $this->id,
            'career_id' => $this->career_id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'current_company' => $this->company,
            'link' => $this->createLinkView($this->link),
            'letter' =>Str::limit($this->letter, 20),
            'cv_download_link' => $this->createLinkDownloadCV($this->applicant_code),
            'created_at' => Carbon::parse($this->created_at)->isoFormat('DD/MM/YYYY [at] HH:mm'),
            'updated_at' => Carbon::parse($this->updated_at)->isoFormat('DD/MM/YYYY [at] HH:mm')
        ];
    }

    private function createLinkView($data)
    {
        if (empty($data)) return "-";

        $list = "<ul>";
        foreach ($data as $item){
            if (empty($item)) continue;
            $list .= "<li><a href='{$item}' target='_blank'>{$item}</a></li>";
        }
        $list .= "</ul>";

        return $list;
    }

    private function createLinkDownloadCV($data)
    {
        return "<a class='btn btn-sm btn-info' href='".route('applicant.download.cv', $data??'')."'><i class='mdi mdi-download'></i> Download</a>";
    }
}
