<?php

namespace InventoryControl\PostType;

use InventoryControl\MetaBox\Customer as CustomerBox;


class Customer extends AbstractPostType implements IPostType
{

    protected static $postType = 'customer';

    public function init ()
    {
        add_filter('manage_edit-customer_columns', [&$this, 'addColumns']);
        add_action('manage_customer_posts_custom_column',  [&$this, 'showColumns']);
    }

    public function addColumns($columns) {
        $newColumns = [];

        $columns['title'] = __('Customer', 'inventory-control');

        foreach($columns as $key => $title) {
            if ($key === 'date') {
                $newColumns['customer_email'] = __('E-mail', 'inventory-control');
                $newColumns['customer_phone'] = __('Phone', 'inventory-control');
            }

            $newColumns[$key] = $title;
        }

        return $newColumns;
    }

    public function showColumns($name) {
        global $post;
        switch ($name) {
            case 'customer_email':
            case 'customer_phone':
                $value = get_post_meta($post->ID, $name, true);
                echo $value;
                break;
        }
    }

    public function registerPostType ()
    {
        $labels = [
            'name'                       => __('Customers', 'inventory-control'),
            'singular_name'              => __('Customer', 'inventory-control'),
            'menu_name'                  => __('Customer', 'inventory-control'),
            'all_items'                  => __('All Customers', 'inventory-control'),
            'new_item_name'              => __('New Customer Name', 'inventory-control'),
            'add_new_item'               => __('Add New Customer', 'inventory-control'),
            'edit_item'                  => __('Edit Customer', 'inventory-control'),
            'update_item'                => __('Update Customer', 'inventory-control'),
            'view_item'                  => __('View Customer', 'inventory-control'),
            'popular_items'              => __('Popular Customers', 'inventory-control'),
            'search_items'               => __('Search Customers', 'inventory-control'),
            'items_list'                 => __('Customers list', 'inventory-control'),
            'items_list_navigation'      => __('Customers list navigation', 'inventory-control'),
        ];

        parent::registerPostType('customer', [
            'label'                 => __('Customers', 'inventory-control'),
            'description'           => __('Customers', 'inventory-control'),
            'labels'                => $labels,
            'hierarchical'          => false,
            'public'                => false,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-admin-users',
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => true,
            'publicly_queryable'    => false,
            'capability_type'       => 'post',
            'supports'              => ['title'],
        ]);
    }

    public function addMetaBox ()
    {
        new CustomerBox();
    }

}

