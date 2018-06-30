<?php
session_start();
class sbotClient {
        var $nameRepo;
        function __construct() {
        }
        function getLogin() {
                return $_SESSION['login'];

        }
        function Post($msg) {
          if (isset($_POST['post'])) {
                $l=$this->getLogin();
                shell_exec ("nodejs /var/www/backend/post.js $l \"$msg\" 2>&1");
                return 1;
          }
    }
        function toDate($ts) {
                $ts=$ts/1000;
                return  date('Y-m-d H:i:s',$ts);
        }
        function getName($r) {
                $l=$this->getLogin();
                if (isset($this->nameRepo[$r])) {
                        return $this->nameRepo[$r];
                } else {
                $v=shell_exec ("nodejs /var/www/backend/getname.js $l \"$r\" 2>&1");
                        if (trim($v)=="") {
                                return $r;
                        } else {
                                return $this->nameRepo[$r]=$v;
                        }
                }
        }
		function render($msg) {
			$msg=str_replace("\n","<br/>",$msg);
			return $msg;
		}
}
$sbot=new sbotClient();
?>