<?php

namespace SweatyApe\Cloudflare\Plugin;

use Swissup\EasySlide\Block\Image;

class SwissupSliderImage
{
    private \Swissup\EasySlide\Helper\Image $helper;

    public function __construct(\Swissup\EasySlide\Helper\Image $helper)
    {
        $this->helper = $helper;
    }

    public function afterResize(
        Image       $subject,
        string|bool $result,
        string      $imageFile,
        int         $w,
        null|int    $h = null
    ): string|bool
    {
        return $this->getImageUrl($imageFile, $w, $h);
    }

    public function getImageUrl(string $imageFile, null|int $w = null, null|int $h = null): string
    {
        $path = '/media/easyslide/' . $imageFile;

        $params = [
            'w' => $w,
            'h' => $h,
            'fit' => 'contain',
            'background' => 'white',
            'f' => 'webp'
        ];

        $query = http_build_query($params, '', ',');

        return "/cdn-cgi/image/{$query}{$path}";
    }

    public function afterGetImageUrl(Image $subject, string $result, string $imageFile): string
    {
        return $this->getImageUrl($imageFile);
    }
}