<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <?php $order = ClassRegistry::init('Order')->find('first', array('conditions' => array('order_id' => $order_id)));?>
    <tr>
        <td colspan="2" style="padding:20px 20px 0 20px">
            <p style="color: #545454; font-size: 13px; line-height: 20px;">Dear <?php echo $order['User']['fullname']?></p>
            <p style="color: #545454; font-size: 13px; line-height: 20px;"><?php echo __('Your order has been placed successfully') ?></p>
            <p style="color: #545454; font-size: 13px; line-height: 20px;"><?php echo __('Your invoice pdf attached with this mail') ?></p>
        </td>
    </tr>
</table>
