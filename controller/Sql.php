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

    public function table(){
        if ($_GET['table']==""){
            echo  "没有找到具体的数据表信息。";
            exit;
        }

        $git = Git::open(GIT_DATA_PATH);
        $_GET['id'] || $_GET['id'] = 'master';
        $sql = $git->run("show {$_GET['id']}:database.sql");

        if (!preg_match("/\-\- Table structure for table `{$_GET['table']}`\n(.*?)\n\-\- Dumping data for table `{$_GET['table']}`/s", $sql, $m)){
            echo  "没有找到具体的数据表信息。";
            exit;
        }

        echo $m[1];
        exit;
    }
}