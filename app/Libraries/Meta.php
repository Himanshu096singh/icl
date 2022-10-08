<?php

namespace App\Libraries;

use App\Models\SeoContent;

class Meta
{
    public static function tags()
    {
        $seo = SeoContent::where('page_name', \Request::route()->getName())->first();
        if (!empty($seo)) {
            $meta = [
                'title' => $seo->meta_title,
                'keyword' => $seo->meta_keyword,
                'description' => $seo->meta_description
            ];
        } else {
            $meta = [];
        }
        return $meta;
    }
}
