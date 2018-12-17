<?php

use yii\db\Migration;
use \yii\db\mysql\Schema;
use app\models\Project;
use app\models\Task;

/**
 * Class m181217_040833_support_arch_file
 */
class m181217_040833_support_arch_file extends Migration
{
    /**
     * {@inheritdoc}
     */
    /*public function safeUp()
    {

    }*/

    /**
     * {@inheritdoc}
     */
    /*public function safeDown()
    {
        echo "m181217_040833_support_arch_file cannot be reverted.\n";

        return false;
    }*/

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->alterColumn(Project::tableName(), 'repo_type', Schema::TYPE_STRING . '(10) DEFAULT "file" COMMENT "上线方式：git/svn/file" AFTER repo_mode');
        $this->alterColumn(Task::tableName(), 'branch', Schema::TYPE_STRING . '(100) DEFAULT "" comment "选择上线的分支"');
    }

    public function down()
    {
        $this->alterColumn(Project::tableName(), 'repo_type', Schema::TYPE_STRING . '(10) DEFAULT "git" COMMENT "上线方式：git/svn" AFTER repo_mode');
        $this->alterColumn(Task::tableName(), 'branch', Schema::TYPE_STRING . '(100) DEFAULT "master" comment "选择上线的分支"');
        return true;
    }
    
}
