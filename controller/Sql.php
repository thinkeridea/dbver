<?php
namespace controller;

use \lib\Git;

class Sql extends Base
{

    public function index()
    {
        $git = Git::open(GIT_DATA_PATH);
        $_GET['id'] || $_GET['id'] = 'master';
        $sql = $git->run("show {$_GET['id']}:database.sql");

        $sql = preg_replace("/\-\- Dumping data for table \`.*?\`/i", "\n", $sql);
        $sql = preg_replace("/((\-\- Modify the data table table \`.*?\`)|(\-\- Table structure for table \`.*?\`))\n/", "", $sql);
        $sql = trim($sql, "\n");
        $this->view->sql = $sql;
        $this->view->display("sql_details");
    }
}