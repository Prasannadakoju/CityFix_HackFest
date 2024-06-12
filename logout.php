<?php

session_start();

session_destroy();

header("Location: selectuser.html");
exit;