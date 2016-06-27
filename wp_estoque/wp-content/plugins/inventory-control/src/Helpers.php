<?php

namespace InventoryControl;

class Helpers
{
    public static function isEditing ()
    {
        global $pagenow;
        return (is_admin() && in_array($pagenow, ['post.php']));
    }
}

