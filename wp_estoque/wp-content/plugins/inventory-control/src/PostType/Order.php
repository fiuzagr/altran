<?php

namespace InventoryControl\PostType;

use InventoryControl\MetaBox\Order as OrderBox;
use InventoryControl\Helpers;


class Order extends AbstractPostType implements IPostType
{

    protected static $postType = 'order';

    public function init ()
    {
        add_filter('manage_edit-order_columns', [&$this, 'addColumns']);
        add_action('manage_order_posts_custom_column', [&$this, 'showColumns']);
    }

    public function addColumns($columns) {
        $newColumns = [];

        $columns['title'] = __('Order', 'inventory-control');

        foreach($columns as $key => $title) {
            if ($key === 'date') {
                $newColumns['order_product_qty'] = __('Order Qty.', 'inventory-control');
                $newColumns['order_product_name'] = __('Product', 'inventory-control');
                $newColumns['order_customer_name'] = __('Customer', 'inventory-control');
            }

            $newColumns[$key] = $title;
        }

        return $newColumns;
    }

    public function showColumns($name) {
        global $post;

        switch ($name) {
            case 'order_product_qty':
                $value = get_post_meta($post->ID, $name, true);
                echo $value;
                break;
            case 'order_product_name':
                $productId = get_post_meta($post->ID, 'order_product_id', true);
                $product = get_post($productId);
                echo $product->post_title;
                break;
            case 'order_customer_name':
                $customerId = get_post_meta($post->ID, 'order_customer_id', true);
                $customer = get_post($customerId);
                echo $customer->post_title;
                break;
        }
    }

    public function registerPostType ()
    {
        $labels = [
            'name'                       => __('Orders', 'inventory-control'),
            'singular_name'              => __('Order', 'inventory-control'),
            'menu_name'                  => __('Order', 'inventory-control'),
            'all_items'                  => __('All Orders', 'inventory-control'),
            'new_item_name'              => __('New Order Name', 'inventory-control'),
            'add_new_item'               => __('Add New Order', 'inventory-control'),
            'edit_item'                  => __('Edit Order', 'inventory-control'),
            'update_item'                => __('Update Order', 'inventory-control'),
            'view_item'                  => __('View Order', 'inventory-control'),
            'popular_items'              => __('Popular Orders', 'inventory-control'),
            'search_items'               => __('Search Orders', 'inventory-control'),
            'items_list'                 => __('Orders list', 'inventory-control'),
            'items_list_navigation'      => __('Orders list navigation', 'inventory-control'),
        ];

        parent::registerPostType(self::$postType, [
            'label'                 => __('Orders', 'inventory-control'),
            'description'           => __('Orders', 'inventory-control'),
            'labels'                => $labels,
            'hierarchical'          => false,
            'public'                => false,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-cart',
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => true,
            'publicly_queryable'    => false,
            'capability_type'       => 'post',
            'supports'              => [null],
        ]);
    }

    public function addMetaBox ()
    {
        new OrderBox();
    }

}

