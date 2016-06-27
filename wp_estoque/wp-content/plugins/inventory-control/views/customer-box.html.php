<table class="form-table">
    <tr class="customer-email">
        <th>
        <label for="customerEmail" class="customer-email__label">
            <?php echo __( 'E-mail', 'inventory-control' ); ?>
        </label>
        </th>
        <td>
            <input
                type="email"
                id="customerEmail"
                name="customer_email"
                class="customer-email__input"
                placeholder="<?php echo __('E-mail', 'inventory-control'); ?>"
                value="<?php echo esc_attr__($fields['customer_email']); ?>"i
                required>
        </td>
    </tr>
    <tr class="customer-phone">
        <th>
        <label for="customerPhone" class="customer-phone__label">
            <?php echo __( 'Phone', 'inventory-control' ); ?>
        </label>
        </th>
        <td>
            <input
                type="tel"
                id="customerPhone"
                name="customer_phone"
                class="customer-phone__input"
                placeholder="<?php echo __('Phone', 'inventory-control'); ?>"
                value="<?php echo esc_attr__($fields['customer_phone']); ?>"
                required
                pattern="([\+]\d{2}\s?)?[\(]\d{2}[\)]\s?\d{4,5}[\-]\d{4}">
            <p>
                <small>
                    <?php printf(__('Format %s', 'inventory-control'), '+55 (99) 99999-9999'); ?>
                </small>
            </p>
        </td>
    </tr>
</table>

