<?php

namespace InventoryControl\PostType;


abstract class AbstractPostType
{

    protected static $postType;

    public function __construct()
    {
        $this->init();

        $this->registerPostType();

        $this->addMetaBox();

        $this->finish();
    }

    protected function init() {}

    protected function finish() {
        flush_rewrite_rules();
    }

    public function registerPostType($postTypeName, $postTypeArgs) {
        register_post_type($postTypeName, $postTypeArgs);
    }
}
