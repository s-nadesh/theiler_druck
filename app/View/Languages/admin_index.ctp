<?php $this->Html->addCrumb(MyClass::translate('Languages')); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-file6"></i> <?php echo MyClass::translate('Manage Languages'); ?></h6>
    </div>
    <div class="datatable">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo MyClass::translate('English'); ?></th>
                    <th><?php echo MyClass::translate('German'); ?></th>
                    <th><?php echo MyClass::translate('Action'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($languages)) { ?>
                    <?php
                    $i = 1;
                    foreach ($languages as $language) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $language['Language']['english'] ?></td>
                            <td>
                                <input type="text" value="<?php echo $language['Language']['german']; ?>" id="<?php echo $language['Language']['language_id'] . '_german_word' ?>" class="form-control" name="german">
                            </td>
                            <td>
                                <input class="btn btn-warning" type="submit" value="<?php echo MyClass::translate('Save'); ?>" onclick="updateLanguage(<?php echo $language['Language']['language_id'] ?>)">
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function updateLanguage(language_id) {
        var german_word = $("#" + language_id + "_german_word").val();
        $.ajax({
            type: 'post',
            url: '<?php echo SITE_BASE_URL ?>admin/languages/update_languange',
            data: { id : language_id, german: german_word },
            success: function(data) {
                alert(data);
            }
        });
    }
</script>