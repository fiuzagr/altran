<?php

namespace InventoryControl\PostType;

use InventoryControl\MetaBox\Product as ProductBox;


class Product extends AbstractPostType implements IPostType
{

    protected static $postType = 'product';

    public function init ()
    {
        add_filter('manage_edit-product_columns', [&$this, 'addColumns']);
        add_action('manage_product_posts_custom_column',  [&$this, 'showColumns']);
    }

    public function addColumns($columns) {
        $newColumns = [];

        $columns['title'] = __('Product', 'inventory-control');

        foreach($columns as $key => $title) {
            if ($key === 'date') {
                $newColumns['product_price'] = __('Price', 'inventory-control');
                $newColumns['product_qty'] = __('Qty.', 'inventory-control');
            }

            $newColumns[$key] = $title;
        }

        return $newColumns;
    }

    public function showColumns($name) {
        global $post;
        switch ($name) {
            case 'product_price':
            case 'product_qty':
                $value = get_post_meta($post->ID, $name, true);
                echo $value;
                break;
        }
    }

    public function registerPostType ()
    {
        $labels = [
            'name'                       => __('Products', 'inventory-control'),
            'singular_name'              => __('Product', 'inventory-control'),
            'menu_name'                  => __('Product', 'inventory-control'),
            'all_items'                  => __('All Products', 'inventory-control'),
            'new_item_name'              => __('New Product Name', 'inventory-control'),
            'add_new_item'               => __('Add New Product', 'inventory-control'),
            'edit_item'                  => __('Edit Product', 'inventory-control'),
            'update_item'                => __('Update Product', 'inventory-control'),
            'view_item'                  => __('View Product', 'inventory-control'),
            'popular_items'              => __('Popular Products', 'inventory-control'),
            'search_items'               => __('Search Products', 'inventory-control'),
            'items_list'                 => __('Products list', 'inventory-control'),
            'items_list_navigation'      => __('Products list navigation', 'inventory-control'),
        ];

        parent::registerPostType('product', [
            'label'                 => __('Products', 'inventory-control'),
            'description'           => __('Products', 'inventory-control'),
            'labels'                => $labels,
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-products',
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
            'supports'              => ['title', 'editor', 'thumbnail'],
            'rewrite'               => ['slug' => '/product'],
        ]);
    }

    public function addMetaBox ()
    {
        new ProductBox();
    }

}

