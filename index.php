<?php

require_once __DIR__ . '/lib/init.php';

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl($appUrl.'/fb-callback.php', $permissions);

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Very Personal App</title>
</head>
<body>
	<h1>My Very Personal App</h1>

	<h2>Account</h2>

	<p>
		<?php
			if (empty($user)) {
				echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
			} else {
				echo '<a href="'.$appUrl.'/logout.php">Log out</a>';
			}
		?>
	</p>

	<?php include __DIR__ . '/lib/profile.php'; ?>

</body>
</html>