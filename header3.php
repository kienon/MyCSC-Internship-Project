<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MyCSC UMS</title>
  <?php 
  date_default_timezone_set("Asia/Kuala_Lumpur");
  
  ob_start();
  $title = isset($_GET['page']) ? ucwords(str_replace("_", ' ', $_GET['page'])) : "";
  ?>
  <?php ob_end_flush() ?>

  <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Bootstrap Icons-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
  <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
  <!--Font awesome-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Font Awesome Icons For DiskHistory -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">

  <!-- DateTimePicker -->
  <link rel="stylesheet" href="assets/dist/css/jquery.datetimepicker.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
        <link href="assets/dist/css/styles2.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/dist/css/kienon.css">
  <link rel="stylesheet" href="assets/dist/css/styles.css">
	<script src="assets/plugins/jquery/jquery.min.js"></script>


  
</head>
    <body id="page-top">
        <!-- Masthead-->
        <header>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-1" id="mainNav">
            <div class="container px-1 px-lg-2">
				<!-- Logo -->
                <a class="navbar-brand"  href="./"><img src="./assets/core-img/logo4.png" alt=""></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
					<!--li class="nav-item"><a class="nav-link" href="./trackdisk.php">Track Your Disk</a></li-->
                        <li class="nav-item"><a class="nav-link" href="./about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="./#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="./contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        </header>
				     <!-- Header section-->
        <section class="page-section bg-primary" id="headsection">

        </section>
		        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="assets/dist/js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
