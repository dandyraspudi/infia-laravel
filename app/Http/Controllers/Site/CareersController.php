<?php

namespace App\Http\Controllers\Site;

use App\Helpers\Formatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicantCreateRequest;
use App\Models\Applicant;
use App\Models\Career;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CareersController extends Controller
{
    public function createApplicant(ApplicantCreateRequest $request)
    {
        /* Validate Request */
        $dataValidated = $request->validated();

        DB::beginTransaction();

        try {

            $applicant_code = Formatter::generateFiledCode("APPLICANT");
            $cv = "";
            $now = Carbon::now()->format("Ym");

            if (!empty($request->file('file_cv'))) {
                $filename = preg_replace('/\s+/', '-', $request->file('file_cv')->getClientOriginalName());
                $path = $request->file('file_cv')->storeAs(
                    'public/career/cv/' . $now . '/', '['.$applicant_code.']-'.$filename
                );

                $cv = 'public/career/cv/' . $now . '/[' .$applicant_code. ']-' .  $filename;
            }
//            dd($this->_parseUrlPortfolio($request->link));

            $request->merge([
                'file' => $cv,
                'applicant_code' => $applicant_code,
                'link' => $this->_parseUrlPortfolio($request->link)
            ]);

            $applicant = Applicant::create($request->all());
            DB::commit();

        } catch (\Exception $ex) {
            Log::channel('daily')->debug('createApplicant -> ' . $ex->getMessage());
            DB::rollBack();
            return redirect()
                ->back()->withInput()->with('failed', 'Failed Create Applicant');
        }

        return redirect()
            ->back()->with('success', 'Successfully Submit Form');

    }

    private function _parseUrlPortfolio($data)
    {
        if (empty($data)) return [];

        $urlParsed = [];
        foreach ($data as $item) {
            if (empty($item)) continue;

            $arrParsedUrl = parse_url($item);

//            logger()->info("url" . Arr::exists($arrParsedUrl, 'scheme'));
//            logger()->info("url2" . json_encode($arrParsedUrl));
//            dd($arrParsedUrl);
            if (Arr::exists($arrParsedUrl, 'scheme') ) {
                $urlParsed[] = $item;
            } else {
                $urlParsed[] = 'http://' . $item;
            }
        }

        return $urlParsed;
    }
}
