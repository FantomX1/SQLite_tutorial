<?php


namespace App;


class SQLiteCreateTable
{
    
    
    private $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;

    }


    public function createTables()
    {

        $commands = [
            'CREATE TABLE IF NOT EXISTS projects (
                        project_id   INTEGER PRIMARY KEY,
                        project_name TEXT NOT NULL
                      )',
            'CREATE TABLE IF NOT EXISTS tasks (
                    task_id INTEGER PRIMARY KEY,
                    task_name  VARCHAR (255) NOT NULL,
                    completed  INTEGER NOT NULL,
                    start_date TEXT,
                    completed_date TEXT,
                    project_id VARCHAR (255),
                    FOREIGN KEY (project_id)
                    REFERENCES projects(project_id) ON UPDATE CASCADE
                                                    ON DELETE CASCADE)'
        ];


        foreach ($commands as $command) {
            $this->pdo->exec($command);
        }

    }


    public function getTableList()
    {

        $stmt = $this->pdo->query("
            SELECT name
            FROM sqlite_master
            WHERE type = 'table'
            ORDER BY name 
        ");

        $tables = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)){
            $tables[] = $row['name'];
        }


        return $tables;
    }

}
