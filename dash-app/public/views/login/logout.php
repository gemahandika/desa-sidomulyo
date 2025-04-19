<?php
session_name("desa_session");
session_start();
session_destroy();
header("location:../../../../");
