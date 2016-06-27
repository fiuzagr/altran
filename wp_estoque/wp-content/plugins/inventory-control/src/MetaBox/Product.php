<?php

namespace InventoryControl\MetaBox;


class Product extends AbstractMetaBox implements IMetaBox
{

    protected static $postType = 'product';

    public function getPostType()
    {
        return 'product';
    }

    public function getPrefix()
    {
        return 'product_';
    }

    public function getBoxName()
    {
        return __('Product Info', 'inventory-control');
    }

    public function getTemplate()
    {
        return 'product-box.html.php';
    }

    public function getMetaFields()
    {
        return [
            'product_price',
            'product_qty',
        ];
    }

    public function getContext()
    {
        return 'side';
    }

    public function getPriority()
    {
        return 'default';
    }
}

