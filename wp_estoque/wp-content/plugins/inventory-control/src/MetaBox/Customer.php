<?php

namespace InventoryControl\MetaBox;


class Customer extends AbstractMetaBox implements IMetaBox
{

    protected static $postType = 'customer';

    public function getPostType()
    {
        return 'customer';
    }

    public function getPrefix()
    {
        return 'customer_';
    }

    public function getBoxName()
    {
        return __('Customer Info', 'inventory-control');
    }

    public function getTemplate()
    {
        return 'customer-box.html.php';
    }

    public function getMetaFields()
    {
        return [
            'customer_email',
            'customer_phone',
        ];
    }

    public function getContext()
    {
        return 'normal';
    }

    public function getPriority()
    {
        return 'high';
    }
}

