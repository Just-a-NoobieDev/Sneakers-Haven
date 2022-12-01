<?php

	// Database Credentials
	define('DB_HOST', 'localhost');
	define('DB_DATABASE', 'sneakers_haven');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');

	// Email Credentials
	define('SMTP_HOST', 'mail.mydomain.com');
	define('SMTP_PORT', 465);
	define('SMTP_USERNAME', 'name@mydomain.com');
	define('SMTP_PASSWORD', '<my password>');
	define('SMTP_FROM', 'noreply@mydomain.com');
	define('SMTP_FROM_NAME', '<your name>');

	// Global Variables
	define('MAX_LOGIN_ATTEMPTS_PER_HOUR', 5);
	define('MAX_EMAIL_VERIFICATION_REQUESTS_PER_DAY', 3);
	define('MAX_PASSWORD_RESET_REQUESTS_PER_DAY', 3);
	define('PASSWORD_RESET_REQUEST_EXPIRY_TIME', 60*60);
	define('CSRF_TOKEN_SECRET', 'ASDasd12sad21_@1sadas!312');
	define('VALIDATE_EMAIL_ENDPOINT', 'http://localhost/YouTube/SecureAccountSystem/validate'); #Do not include trailing /
	define('RESET_PASSWORD_ENDPOINT', 'http://localhost/Youtube/SecureAccountSystem/resetpassword'); #Do not include trailing /

	// Code we want to run on every page/script
	date_default_timezone_set('UTC'); 
	error_reporting(0);
	session_set_cookie_params(['samesite' => 'Strict']);
	session_start();
	