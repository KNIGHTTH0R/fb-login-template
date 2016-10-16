<?php

if (isset($user) && !empty($user)) {

	echo '<div class="profile">';

	echo 'Name: ' . $user['name'];

	// OR
	// echo 'Name: ' . $user->getName();
	//

	echo '</div>';

}
