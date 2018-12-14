<?php
/**
 * @var yii\web\View $this
 */
$this->title = yii::t('task', 'submit task title');
use yii\widgets\ActiveForm;
use app\models\Task;

?>
<div class="box">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
      <div class="box-body">
        <?= $form->field($task, 'title')->label(yii::t('task', 'submit title'), ['class' => 'control-label bolder blue']) ?>
        
        <div class="form-group task_archive_file required">
            <label class="control-label bolder blue" for="task-archive-file">上传代码包</label>
            <input type="file" id="task_archive_file" name="task_archive_file" >
            <div class="help-block"></div>
        </div>
      </div>

	  <br/>
      <div class="box-footer">
        <input type="submit" class="btn btn-primary" value="<?= yii::t('w', 'submit') ?>">
      </div>
      
    <?php ActiveForm::end(); ?>
</div>

