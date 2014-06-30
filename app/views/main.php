<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui" />
	<title>Page Title</title>
	
	<!-- Main CSS -->
	<link rel="stylesheet" href="/mentorconnect/css/styles.css">

	<!-- Payload CSS -->
	<?php echo Payload::get_css(); ?>

	<!-- Modernizr -->
	<script src="/mentorconnect/bower_components/modernizr/modernizr.js"></script>

</head>
<body>
	<div class="container">
		<?php echo $primary_header; ?>            

    <main>
		<?php echo $main_content; ?>
    </main>

    <footer>

        <?php echo $primary_footer; ?>
        <!-- <p>&copy FooBar Productions</p> -->
        
    </footer>
    
</div>

	<!-- Include Common Scripts -->
	<script src="/mentorconnect/bower_components/jquery/dist/jquery.js"></script>
	<script src="/mentorconnect/bower_components/ReptileForms/dist/reptileforms.js"></script>

	<!-- Get JS -->
	<script>var app = {};app.settings=<?php echo Payload::get_settings(); ?>;</script>
	<?php echo Payload::get_js(); ?>
	
	<!-- Main JS -->
	<script src="/mentorconnect/js/main.js"></script>

</body>
</html>