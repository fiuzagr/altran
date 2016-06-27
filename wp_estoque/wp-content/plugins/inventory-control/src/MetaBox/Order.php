<?php

namespace InventoryControl\MetaBox;

use InventoryControl\Helpers;


class Order extends AbstractMetaBox implements IMetaBox
{

    protected static $postType = 'order';

    public function init()
    {
        add_action('ic_after_save_' . static::$postType, [&$this, 'afterSave']);

        parent::init();
    }

    public function afterSave($post_id, $post, $update)
    {
        if ($update) {
            return;
        }

        $productId = get_post_meta($post_id, 'order_product_id', true);
        $orderQty = (int) get_post_meta($post_id, 'order_product_qty', true);
        $productQty = (int) get_post_meta($productId, 'product_qty', true);

        $productQty -= $orderQty;

        // Update inventory
        update_post_meta($productId, 'product_qty', $productQty);

        // Set title
        $title = __('Order', 'inventory-control') . ' #' . $post_id;
        wp_update_post(['ID' => $post_id, 'post_title' => $title]);
    }

    public function getPostType()
    {
        return 'order';
    }

    public function getPrefix()
    {
        return 'order_';
    }

    public function getBoxName()
    {
        global $post;

        return Helpers::isEditing()
            ? sprintf(__('Order %s', 'inventory-control'), ' #' . $post->ID)
            : __('New Order', 'inventory-control');
    }

    public function getTemplate()
    {
        return 'order-box.html.php';
    }

    public function getMetaFields()
    {
        return [
            'order_product_id',
            'order_product_qty',
            'order_customer_id',
        ];
    }

    public function getAdditionalFields()
    {
        if (Helpers::isEditing()) {
            $productId = get_post_meta(get_the_ID(), 'order_product_id', true);
            $product = get_post($productId);

            $customerId = get_post_meta(get_the_ID(), 'order_customer_id', true);
            $customer = get_post($customerId);

            return [
                'product' => $product,
                'customer' => $customer,
            ];
        }

        $products = get_posts([
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'orderby'        => 'post_title',
            'order'          => 'ASC',
            'posts_per_page' => -1,
            'meta_query' => [[
                'key'       => 'product_qty',
                'value'     => '0',
                'compare'   => '>',
            ]],
        ]);

        $customers = get_posts([
            'post_type'      => 'customer',
            'post_status'    => 'publish',
            'orderby'        => 'post_title',
            'order'          => 'ASC',
            'posts_per_page' => -1,
        ]);

        return [
            'products' => $products,
            'customers' => $customers,
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

