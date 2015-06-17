<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td colspan="2" style="padding:20px 20px 0 20px">
            <p style="color: #545454; font-size: 13px; line-height: 20px;">Dear <?php echo $data['ProductQuestion']['question_name']; ?></p>
        </td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px">Question:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['ProductQuestion']['question_content'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px">Answer:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['ProductAnswer']['answer_content'] ?></td>
    </tr>
</table>