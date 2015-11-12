<!-- file path View/Subjects/get_by_category.ctp -->
<?php foreach ($subjects as $key => $value): ?>
<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
<?php endforeach; ?>