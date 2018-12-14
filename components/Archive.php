<?php

namespace app\components;

use app\models\Project;
use app\models\Task as TaskModel;

class Archive extends Command {

    /**
     * 解压代码包
     *
     * @param TaskModel $task
     * @return bool
     */
    public function updateToVersion(TaskModel $task) {
        $destination = Project::getDeployWorkspace($task->link_id);
        @unlink($destination);
        
        $arch_type = pathinfo($task->file_list, PATHINFO_EXTENSION);
        if ($arch_type == 'zip') {
            $cmd[] = sprintf('unzip %s -d %s', $task->file_list, $destination);
        } elseif ($arch_type == 'tgz') {
            $cmd[] = sprintf('mkdir -p %s', $destination);
            $cmd[] = sprintf('tar -zxvf %s -C %s', $task->file_list, $destination);
        }
        
        $command = join(' && ', $cmd);
        return $this->runLocalCommand($command);
    }

}
