<?php

namespace Source\Support;

use CoffeeCode\Optimizer\Optimizer;

class SEO
{
    protected $optimizer;


    public function __construct(string $schema = 'article')
    {
        $this->optimizer = new Optimizer();

        $this->optimizer->openGraph(
            CONF_SITE_NAME,
            CONF_SITE_LANG,
            $schema
        )->twitterCard(
            CONF_SEO_SOCIAL_TWITTER_CREATOR,
            CONF_SEO_SOCIAL_TWITTER_PUBLISHER,
            CONF_SITE_DOMAIN
        )->publisher(
            CONF_SEO_SOCIAL_FACEBOOK_PAGE,
            CONF_SEO_SOCIAL_FACEBOOK_AUTHOR
        )->facebook(
            CONF_SEO_SOCIAL_FACEBOOK_APP
        );
    }

    public function __get($name): string
    {
        return $this->optimizer->data()->$name;
    }

    public function getOptimizer(): Optimizer
    {
        return $this->optimizer;
    }

    public function render(
        string $title,
        string $description,
        string $url,
        string $image,
        bool $follow = true
    ): string {
        return $this->optimizer->optimize($title, $description, $url, $image, $follow)->render();
    }
}