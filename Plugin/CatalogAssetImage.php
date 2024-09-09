<?php

namespace SweatyApe\Cloudflare\Plugin;

class CatalogAssetImage
{
    private \SweatyApe\Cloudflare\Helper\Data $helper;

    public function __construct(\SweatyApe\Cloudflare\Helper\Data $helper)
    {
        $this->helper = $helper;
    }

    public function afterGetUrl(\Magento\Catalog\Model\View\Asset\Image $subject, $result)
    {
        return $this->helper->convertUrl($result);
    }
}