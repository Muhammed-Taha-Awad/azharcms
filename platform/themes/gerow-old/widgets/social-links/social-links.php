<?php

use Botble\Widget\AbstractWidget;

class SocialLinksWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('Social Links'),
            'description' => __('Widget display social links network'),
            'content' => '',
            'icon' => '',
            'link_1' => 'https://www.facebook.com/',
            'icon_1' => 'fab fa-facebook-f',
            'link_2' => 'https://twitter.com/',
            'icon_2' => 'fab fa-twitter',
            'link_3' => 'https://www.instagram.com/',
            'icon_3' => 'fab fa-instagram',
            'link_4' => 'https://www.pinterest.com/',
            'icon_4' => 'fab fa-pinterest-p',
        ]);
    }
}
