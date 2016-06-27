<?php

namespace InventoryControl\MetaBox;

if (!defined('IC_VIEWS_DIR')) {
    exit('Please define IC_VIEWS_DIR. ' . __FILE__);
}


abstract class AbstractMetaBox
{

    protected static $postType;

    public function __construct()
    {
        if (is_admin()) {
            add_action('load-post.php', [&$this, 'init']);
            add_action('load-post-new.php', [&$this, 'init']);
        }
    }

    public function init()
    {
        add_action('add_meta_boxes', [&$this, 'addBox' ]);
        add_action('save_post_' . static::$postType, [&$this, 'save'], 10, 3);
    }

    public function addBox()
    {
        add_meta_box(
            $this->getPrefix() . '_box',
            $this->getBoxName(),
            [&$this, 'renderBox'],
            $this->getPostType(),
            $this->getContext(),
            $this->getPriority()
        );
    }

    public function renderBox($post)
    {
        wp_nonce_field(
            $this->getPrefix() . 'nonce_action',
            $this->getPrefix() . 'nonce'
        );

        $fields = [];
        foreach ($this->getMetaFields() as $field) {
            $fields[$field] = get_post_meta($post->ID, $field, true);
            if (empty($fields[$field])) $fields[$field] = '';
        }

        if (method_exists($this, 'getAdditionalFields')) {
            $fields = array_merge($fields, $this->getAdditionalFields());
        }

        include IC_VIEWS_DIR . $this->getTemplate();
    }

    public function save($post_id, $post, $update)
    {

        $nonce_name   = $_POST[$this->getPrefix() . 'nonce'];
        $nonce_action = $this->getPrefix() . 'nonce_action';

        // Some checks
        if (
            (!isset($nonce_name))
            or (!wp_verify_nonce($nonce_name, $nonce_action))
            or (!current_user_can('edit_post', $post_id))
            or (wp_is_post_autosave($post_id))
            or (wp_is_post_revision($post_id))
        ) {
            return;
        }

        foreach ($this->getMetaFields() as $field) {
            if (isset($_POST[$field])) {
                // Sanitize input
                $value = $_POST[$field]
                    ? sanitize_text_field($_POST[$field]) : '';
                // Update
                update_post_meta($post_id, $field, $value);
            }
        }

        // prevent infinite loops
        remove_action('save_post_' . static::$postType, [&$this, 'save'], 10, 3);
        // run after action
        do_action('ic_after_save_' . static::$postType, $post_id, $post, $update);
        // redo action
        add_action('save_post_' . static::$postType, [&$this, 'save'], 10, 3);

    }

}
