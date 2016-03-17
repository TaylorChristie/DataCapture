<?php

require '../src/captureData.php';


$new = new \MineSQL\captureData("textlog");

echo 'file='.$new->capture(true);