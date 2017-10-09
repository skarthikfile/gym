<?
// This file contains optional configuration parameters for your E*REMINDERS installation.
// This is not necessary to configure, but if you find the desire to customize some aspects
// of E*REMINDERS behaviour, you are free to do so.






/*
// If you wish to stop other users from using e*reminders,
//  replace the text TRUE with FALSE in the line with "define ( 'PERMIT_NEW_USER_REGISTRATION', TRUE);" as indicated
//
// This is really useful if E*REMINDERS use is abusive, and you wish to reject new users.
//
// If PERMIT_NEW_USER_REGISTRATION is set to FALSE, this is what happens:
// This stops the executing of source code where a new user is registered.
// - Thus restricting new users from registering and using this software.
//
// NOTE: If USE_EREMINDERS_AUTHENTICATION is set to FALSE, you can't register new users anyhow. 
//  Therefore, it is never the case that new user registration happens through E*REMINDERS.
//  If USE_EREMINDERS_AUTHENTICATION is set to FALSE. You must manually add users through htpasswd/htaccess
//
*/

define( 'PERMIT_NEW_USER_REGISTRATION', TRUE);





/*
// If you wish to use the authentication system within E*REMINDERS to
//  authenticate user password combinations, then leave 
//  the USE_EREMINDERS_AUTHENTICATION define statement alone.
//
// Otherwise, to use apache authentication for user passwords,
//  change define( 'USE_EREMINDERS_AUTHENTICATION', TRUE) to FALSE
//
//
// Which is right for you?
//
// If you wish to permit any website visitors to use your E*REMINDERS installation,
//  leave USE_EREMINDERS_AUTHENTICATION set to TRUE
//  (since it's possible may occasionally see the need to limit new user registration to your
//   installation of E*REMINDERS, this is the option that'll ocassionally permit you to toggle
//   the ability to permit new users to register and use E*REMINDERS (see PERMIT_NEW_USER_REGISTRATION))
//
// 
// If you want to restrict account access to use E*REMINDERS and act like a moderator
//  to manually approve/add users to use software,
//  Or if you want to be the only one accessing this software and want to reduce the parameters
//   you enter when you use E*REMINDERS (you won't have to complete the "Password" or "E-Mail To" fields)
//
//  then set USE_EREMINDERS_AUTHENTICATION to FALSE
//  and then update your htaccess file appropriately. 
//  (visit this link if this is unfamiliar http://www.google.com/search?q=htaccess+htpasswd )
//  (since you're probably using cron to schedule E*REMINDERS with wget, wget won't connect without user authentication
//   You may wish to view: man wget or call wget within your crontab as so: 
//   wget http://www.domain.tld/<ereminders>/mail.php --http-user=user --http-passwd=password -q -o /dev/null
//  
*/

define( 'USE_EREMINDERS_AUTHENTICATION', TRUE);





// DO NOT EDIT BELOW

// =======================================================================
// -----------------------------------------------------------------------
// =======================================================================



define( 'RESTRICT_NEW_USER_REGISTRATION', !PERMIT_NEW_USER_REGISTRATION);
define( 'USE_APACHE_AUTHENTICATION', !USE_EREMINDERS_AUTHENTICATION);

?>
