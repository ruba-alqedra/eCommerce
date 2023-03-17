<?php
require('db.php');
require('includes/functions.php');
if (!isset($_SESSION['USER_LOGIN'])) {
?>
	<script>
		window.location.href = 'index.php';
	</script>
<?php
}
$name = get_safe_value($con, $_POST['name']);
$email = get_safe_value($con, $_POST['email']);
$mobile = get_safe_value($con, $_POST['mobile']);

$uid = $_SESSION['USER_ID'];
$sql = "update users set name='$name',email='$email',mobile='$mobile' where id='$uid'";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result)) {
	$row['name'] = $name;
	$row['email'] = $email;
	$row['mobile'] = $mobile;
}


echo "Your name updated";
?>