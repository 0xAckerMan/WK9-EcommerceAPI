<?php

// changing the login page url and redirecting it to the home page
//also secured my admin dashbord in that even after trying to access wp-admin it redirects to the home page
function secret_login_url() {
    if (strpos($_SERVER['REQUEST_URI'], 'wp-login.php')) {
      wp_redirect(home_url('404.php'));
      exit();
    }
  }
add_action('init', 'secret_login_url');


function limit_login_attempts($username) {
  $failed_login_limit = 5;
  $block_duration = 3 * MINUTE_IN_SECONDS;

  $user = get_user_by('login', $username);
  if (!$user) {
      return;
  }

  $failed_login_count = intval(get_user_meta($user->ID, 'failed_login_count', true));
  $block_expiration = get_user_meta($user->ID, 'block_expiration', true);

  if ($failed_login_count >= $failed_login_limit) {
      if (time() < $block_expiration) {
          wp_die('Too many login attempts. Please try again after 3 minutes.');
      } else {
          update_user_meta($user->ID, 'failed_login_count', 0);
          update_user_meta($user->ID, 'block_expiration', 0);
      }
  }

  $failed_login_count++;
  update_user_meta($user->ID, 'failed_login_count', $failed_login_count);

  if ($failed_login_count % $failed_login_limit === 0) {
      update_user_meta($user->ID, 'block_expiration', time() + $block_duration);
  }
}
add_action('wp_login_failed', 'limit_login_attempts', 10, 1);


?>