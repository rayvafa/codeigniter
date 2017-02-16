<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
    <div>
        <?php echo form_label('Publication Name', 'publication_id'); ?>
        <?php echo form_dropdown('publication_id', $publication_form_options, set_value('publication_id')); ?>
    </div>
    <div>
        <?php echo form_label('Issue Number', 'issue_number'); ?>
        <?php echo form_input('issue_number', set_value('issue_number')); ?>
    </div>
    <div>
        <?php echo form_label('Date Published', 'issue_date_publication'); ?>
        <?php echo form_input('issue_date_publication', set_value('issue_date_publication')); ?>
    </div>
    <div>
        <?php echo form_submit('save', 'Save'); ?>
    </div>
<?php echo form_close(); ?>