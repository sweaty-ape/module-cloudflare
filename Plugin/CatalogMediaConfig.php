<?php

namespace SweatyApe\Cloudflare\Plugin;

class CatalogMediaConfig
{
    // Change the "Catalog media URL format" option to "Image optimization based on query parameters"
    // because we need an url to original image. Cloudflare will resize it on it's own.
    public function afterGetMediaUrlFormat(\Magento\Catalog\Model\Config\CatalogMediaConfig $subject, $result)
    {
        return \Magento\Catalog\Model\Config\CatalogMediaConfig::IMAGE_OPTIMIZATION_PARAMETERS;
    }
}