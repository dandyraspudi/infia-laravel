<?php
namespace App\Helpers;

use Illuminate\Support\Str;

class Formatter
{
    /**
     * // TODO
     * - Implement check unique slug on db.
     *
     * @param String $text String to Slug
     * @param String $model Instance of Models Class
     *
     * @return String
     */
    public function getSlug($text, $model)
    {
        $text = preg_replace('/[^A-z0-9\s]/', '', $text);
        $text = preg_replace('/\s+/', '-', $text);
        $text = strtolower($text);

        $slug = $model->where('slug', $text);
        if ($slug->exists())
            $text .= '-' . Str::random(5);

        return $text;
    }

    /**
     *
     * - Create code name
     */
    public static function generateFiledCode($code = 'DEFAULT')
    {
        return $code.'-'.date('s').date('y').date('i').date('m').date('h').date('d').mt_rand(1000000, 9999999);
    }
}
