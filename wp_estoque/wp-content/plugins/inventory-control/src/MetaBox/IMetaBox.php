<?php

namespace InventoryControl\MetaBox;


interface IMetaBox
{
    public function getPostType();

    public function getPrefix();

    public function getBoxName();

    public function getTemplate();

    public function getMetaFields();

    public function getContext();

    public function getPriority();
}
