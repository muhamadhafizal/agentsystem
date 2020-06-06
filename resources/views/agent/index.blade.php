<?php
session_start();
$username = session()->get('username');
$password = session()->get('password');
$role = session()->get('role');
if (!isset($username)) {
	echo '<script>window.location.replace("/")</script>;';
}
if ($role == 'admin' || $role == 'acount') {
	echo '<script>window.location.replace("admin")</script>;';
}
?>
<!DOCTYPE html>
<html lang="en">
    <p>HELLO AGENT</p>
</html>