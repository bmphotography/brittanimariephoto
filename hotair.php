<?php

header("Content-disposition: attachment; filename=hotair.jpg");
header("Content-type: application/pdf");
readfile("images/portfolio/hotair.jpg");

?>