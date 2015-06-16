<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td colspan="2" style="padding:20px 20px 0 20px">
            <p style="color: #545454; font-size: 13px; line-height: 20px;">Dear Admin!</p>
        </td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><label><?php echo MyClass::translate('Company')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_company'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Name')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_name'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Firstname')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_firstname'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px">Email:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_email'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Street/No')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_street'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Zip / City')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_plz'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Phone')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_phone'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Fax')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_fax'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Please contact us by phone')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_is_phonecontact'] == 'Y' ? MyClass::translate('Yes') : MyClass::translate('No') ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Title of the product')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_product_title'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('No. of Copies')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_edition'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Product Type')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_product_type'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Format')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_format_1'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Customised Size')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_big_individual'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Pages')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_printed'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Page Content')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_sides_content'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Cover Page')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_cover_pages'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Others')?>:</td>
        <td style="padding:20px 20px 0 20px">
            <?php echo $data['Page']['inquiry_others_1'] ?><br />
            <?php echo $data['Page']['inquiry_others_2'] ?>
        </td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Format')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_format_2'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Special colors')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_special_colors'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Paper')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_paper'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('with window')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_with_window'] == 'Yes' ? MyClass::translate('Yes') : MyClass::translate('No') ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Others')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_paper_others'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Paper weight')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_paper_weight'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Others')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_paper_weight_others'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Envelope')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_envelope'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Others')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_envelope_others'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Content')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_cont'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Others')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_cont_others'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Paper')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_paper_2'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('numbered')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_numbered'] == 'Yes' ? MyClass::translate('Yes') : MyClass::translate('No') ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('from')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_numbered_from'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('to')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_numbered_to'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('perforation') ?> 2er:</td>
        <td style="padding:20px 20px 0 20px">
            <?php echo $data['Page']['inquiry_preforation_2er'] == 'Yes' ? MyClass::translate('Yes') : MyClass::translate('No') ?><br />
            <?php echo MyClass::translate('Diameter').': '.$data['Page']['inquiry_preforation_2er_mm'].': '.MyClass::translate('mm') ?>
        </td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('perforation') ?> 4er:</td>
        <td style="padding:20px 20px 0 20px">
            <?php echo $data['Page']['inquiry_preforation_4er'] == 'Yes' ? MyClass::translate('Yes') : MyClass::translate('No') ?><br />
            <?php echo MyClass::translate('Diameter').': '.$data['Page']['inquiry_preforation_4er_mm'].': '.MyClass::translate('mm') ?>
        </td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Merge') ?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_gather'] == 'Yes' ? MyClass::translate('Yes') : MyClass::translate('No') ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Divide') ?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_sliced'] == 'Yes' ? MyClass::translate('Yes') : MyClass::translate('No') ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Prepress') ?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_prepress']?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('ready-for-exposure Data deliver on') ?>:</td>
        <td style="padding:20px 20px 0 20px">
            <?php echo MyClass::translate('CD') ?>:<?php echo $data['Page']['inquiry_cd'] == 'Yes' ? MyClass::translate('Yes') : MyClass::translate('No') ?><br />
            <?php echo MyClass::translate('Email') ?>:<?php echo $data['Page']['inquiry_is_email'] == 'Yes' ? MyClass::translate('Yes') : MyClass::translate('No') ?><br />
        </td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate('Other Remarks to your request') ?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_request_notes']?></td>
    </tr>
    
</table>