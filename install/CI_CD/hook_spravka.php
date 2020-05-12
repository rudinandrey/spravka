<?php

$headers = getallheaders();

$json = json_decode(file_get_contents("php://input"), true);

$event = $headers["X-Github-Event"];
$ref = explode("/", $json["ref"]);
$branch= end($ref);

$result = $event."\n".$branch;

$str = shell_exec("/usr/bin/sudo -u {user} -S /bin/bash /home/{user}/sync.sh $branch");
echo $str;
