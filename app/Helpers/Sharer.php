<?php
namespace App\Helpers;

use Illuminate\Support\Str;

class Sharer
{
    /**
     *
     * Create Url sharer foe social media
     *
     * @var String $url_to_share
     * @var String $twitter_text
     *
     * @return array $url
     */
    public static function generateShareLink($url_to_share, $twitter_text = '')
    {
        return [
            'facebook' => self::facebook($url_to_share),
            'twitter' => self::twitter($url_to_share, $twitter_text)
        ];
    }

    /**
     * Facebook share link
     *
     * @return $url
     */
    private static function facebook($url_shared = "")
    {
        $url = config('infia-share.services.facebook.uri') . $url_shared;

        return $url;
    }

    /**
     * Twitter share link
     *
     * @return $url
     */
    private static function twitter($url_shared = "", $title = "")
    {
        if (empty($title)) {
            $title = config('edukasia-share.services.twitter.text');
        }

        $base = config('infia-share.services.twitter.uri');
        $url = $base . '?text=' . urlencode($title) . '&url=' . $url_shared;

        return $url;
    }
}
