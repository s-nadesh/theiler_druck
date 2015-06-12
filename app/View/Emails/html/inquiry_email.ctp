<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td colspan="2" style="padding:20px 20px 0 20px">
            <p style="color: #545454; font-size: 13px; line-height: 20px;">Dear Admin!</p>
        </td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><label><?php echo __('Company')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_company'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Name')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_name'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Firstname')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_firstname'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px">Email:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_email'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Street/No')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_street'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('PLZ/Place')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_plz'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Phone')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_phone'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Fax')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_fax'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Please contact us by phone')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_is_phonecontact'] == 'Y' ? __('Yes') : __('No') ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Title of the product')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_product_title'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Edition')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_edition'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Product Type')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_product_type'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Format')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_format_1'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Big individual')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_big_individual'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Scope')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_printed'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Sides Content')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_sides_content'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Cover pages')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_cover_pages'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Others')?>:</td>
        <td style="padding:20px 20px 0 20px">
            <?php echo $data['Page']['inquiry_others_1'] ?><br />
            <?php echo $data['Page']['inquiry_others_2'] ?>
        </td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Format')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_format_2'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Special colors')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_special_colors'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Paper')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_paper'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('with window')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_with_window'] == 'Yes' ? __('Yes') : __('No') ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Others')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_paper_others'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Paper weight')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_paper_weight'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Others')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_paper_weight_others'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Envelope')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_envelope'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Others')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_envelope_others'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Content')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_cont'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Others')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_cont_others'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Paper')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_paper_2'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('numbered')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_numbered'] == 'Yes' ? __('Yes') : __('No') ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('from')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_numbered_from'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('to')?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_numbered_to'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('perforation') ?> 2er:</td>
        <td style="padding:20px 20px 0 20px">
            <?php echo $data['Page']['inquiry_preforation_2er'] == 'Yes' ? __('Yes') : __('No') ?><br />
            <?php echo __('Diameter').': '.$data['Page']['inquiry_preforation_2er_mm'].': '.__('mm') ?>
        </td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('perforation') ?> 4er:</td>
        <td style="padding:20px 20px 0 20px">
            <?php echo $data['Page']['inquiry_preforation_4er'] == 'Yes' ? __('Yes') : __('No') ?><br />
            <?php echo __('Diameter').': '.$data['Page']['inquiry_preforation_4er_mm'].': '.__('mm') ?>
        </td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('gather') ?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_gather'] == 'Yes' ? __('Yes') : __('No') ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('sliced') ?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_sliced'] == 'Yes' ? __('Yes') : __('No') ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Prepress') ?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_prepress']?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Exposure violent data delivered on') ?>:</td>
        <td style="padding:20px 20px 0 20px">
            <?php echo __('CD') ?>:<?php echo $data['Page']['inquiry_cd'] == 'Yes' ? __('Yes') : __('No') ?><br />
            <?php echo __('Email') ?>:<?php echo $data['Page']['inquiry_is_email'] == 'Yes' ? __('Yes') : __('No') ?><br />
        </td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo __('Notes to other ihler request') ?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['inquiry_request_notes']?></td>
    </tr>
    
</table>