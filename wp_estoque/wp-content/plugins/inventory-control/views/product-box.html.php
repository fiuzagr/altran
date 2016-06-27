<table class="form-table">
    <tr class="product-price">
        <th>
            <label for="productPrice" class="product-price__label">
                <?php echo __('Price', 'inventory-control'); ?>
            </label>
        </th>
        <td>
            <input
                type="number"
                step="0.01"
                min="0.01"
                max="99999.99"
                id="productPrice"
                name="product_price"
                class="product-price__input"
                placeholder="<?php echo __( 'Price', 'inventory-control' ); ?>"
                value="<?php echo $fields['product_price'] ?: '99999.99'; ?>"
                required>
        </td>
    </tr>
    <tr class="product-qty">
        <th>
            <label for="productQty" class="product-qty__label">
                <?php echo __('Qty.', 'inventory-control'); ?>
            </label>
        </th>
        <td>
            <input
                type="number"
                step="1"
                min="0"
                max="99999"
                id="productQty"
                name="product_qty"
                class="product-qty__input"
                placeholder="<?php echo __( 'Qty.', 'inventory-control' ); ?>"
                value="<?php echo $fields['product_qty'] ?: '0'; ?>"
                required>
        </td>
    </tr>
</table>

