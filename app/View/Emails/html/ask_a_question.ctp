<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td colspan="2" style="padding:20px 20px 0 20px">
            <p style="color: #545454; font-size: 13px; line-height: 20px;">Dear Admin!</p>
        </td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px">Name:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['ProductQuestion']['question_name'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px">Email:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['ProductQuestion']['question_email'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px">Phone:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['ProductQuestion']['question_phone'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px">Question:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['ProductQuestion']['question_content'] ?></td>
    </tr>
</table>