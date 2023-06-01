<?php

if (!isset($_SESSION["useruid"])){
	header("location: ../login/");
    exit();
}
