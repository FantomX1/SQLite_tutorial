<?php


namespace App;


class SQLiteInsert
{


    private $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    public function insertProject($projectName)
    {
        $sql = "INSERT INTO projects(project_name) VALUES (:project_name)";
        $stmt=$this->pdo->prepare($sql);
        $stmt->bindValue(":project_name", $projectName);
        $stmt->execute();
        
        return $this->pdo->lastInsertId();   
        
    }


    public function insertTask($taskName, $startDate, $completedDate, $completed, $projectId)
    {

        $sql = "INSERT INTO tasks(task_name,start_date,completed_date,completed,project_id)".
               'VALUES(:task_name,:start_date,:completed_date,:completed,:project_id)';

        $stmt=$this->pdo->prepare($sql);

        $stmt->execute([
            ':task_name'=>$taskName,
            ':start_date'=>$startDate,
            ':completed_date'=>$completedDate,
            ':completed'=>$completed,
            ':project_id'=>$projectId,
        ]);

        return $this->pdo->lastInsertId();
        
    }

}
