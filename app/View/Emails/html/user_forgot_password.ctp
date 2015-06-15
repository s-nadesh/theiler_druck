<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td  style="padding:20px 20px 0 20px">
            <p style="color: #545454; font-size: 13px; line-height: 20px;">
                Dear <?php echo (isset($name)) ? $name : "User"; ?>!
            </p>
            <p style="color: #545454; font-size: 13px; line-height: 20px;">
                We received a request to reset the password for your account.To reset your password, click on the button below (or copy/paste the URL into your browser).
            </p>
            <p style="color: #545454; font-size: 13px; line-height: 20px;">
                <a href="<?php echo $reset_link; ?>">Click to Reset Password</a>.
            </p>
            <p style="color: #545454; font-size: 13px; line-height: 20px;">
                This Password Link is valid for only 5 minutes from request time <?php echo $time_valid; ?>
            </p>
        </td>
    </tr>
</table>