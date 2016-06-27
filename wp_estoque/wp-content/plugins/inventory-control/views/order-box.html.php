<?php
use InventoryControl\Helpers;
?>
<table class="form-table">
    <tr class="order-product">
        <th>
            <label for="orderProduct" class="order-product__label">
                <?php echo __('Product', 'inventory-control'); ?>
            </label>
        </th>
        <td>
            <?php if (Helpers::isEditing()) : ?>
                <?php echo (
                    $fields['product']
                    ? $fields['product']->post_title
                    : ''
                ); ?>
            <?php else : ?>
                <select id="orderProduct" name="order_product_id" required>
                    <option value="">
                        <?php echo __('Choose', 'inventory-control'); ?>
                    </option>
                    <?php foreach ($fields['products'] as $product) : ?>
                        <?php $productQty = get_post_meta($product->ID, 'product_qty', true); ?>
                        <option
                            value="<?php echo $product->ID; ?>"
                            data-inventory-qty="<?php echo $productQty; ?>"
                            <?php echo (
                                $fields['order_product_id'] == $product->ID
                                ? 'selected' : ''
                            ); ?>>
                            <?php echo (
                                $product->post_title
                                . ' ('
                                . __('Inventory Qty.', 'inventory-control')
                                . ': '
                                . $productQty
                                . ')'
                            ); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>
        </td>
    </tr>
    <tr class="order-product-qty">
        <th>
            <label for="orderProductQty" class="order-product-qty__label">
                <?php echo __('Product Qty.', 'inventory-control'); ?>
            </label>
        </th>
        <td>
            <?php if (Helpers::isEditing()) : ?>
                <?php echo ($fields['order_product_qty'] ?: 1); ?>
            <?php else : ?>
                <input
                    type="number"
                    step="1"
                    min="1"
                    max="9999"
                    id="orderProductQty"
                    name="order_product_qty"
                    class="order-product-qty__input"
                    placeholder="<?php echo __('Product Qty.', 'inventory-control'); ?>"
                    value="<?php echo $fields['order_product_qty'] ?: '1'; ?>"
                    required>
            <?php endif; ?>
        </td>
    </tr>
    <tr class="order-customer">
        <th>
            <label for="orderCustomer" class="order-customer__label">
                <?php echo __('Customer', 'inventory-control'); ?>
            </label>
        </th>
        <td>
            <?php if (Helpers::isEditing()) : ?>
                <?php echo (
                    $fields['customer']
                    ? $fields['customer']->post_title
                    : ''
                ); ?>
            <?php else : ?>
                <select id="orderCustomer" name="order_customer_id" required>
                    <option value="">
                        <?php echo __('Choose', 'inventory-control'); ?>
                    </option>
                    <?php foreach ($fields['customers'] as $customer) : ?>
                        <option
                            value="<?php echo $customer->ID; ?>"
                            <?php echo (
                                $fields['order_customer_id'] == $customer->ID
                                ? 'selected' : ''
                            ); ?>>
                            <?php echo $customer->post_title; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>
        </td>
    </tr>
</table>

