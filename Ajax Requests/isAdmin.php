<?php
require_once(dirname(__DIR__)."/Model/UserModel.php");
echo json_encode(UserModel::checkRole());
