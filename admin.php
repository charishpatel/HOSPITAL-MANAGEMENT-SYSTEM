<!DOCTYPE HTML>
<!--
	Projection by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Hospital Management</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
<?php
include 'validateSession.php';
include 'nav.php';
?>
		
			<section id="banner">
				<div class="inner">
					<header>
						<h1>Hospital Management</h1>
					</header>

					<div class="flex ">

						<div>
							<span class="icon fa-wheelchair"></span>
							<h3>Patient</h3>
                                                        <p><a href="register.php">Registration</a></p>
						</div>

						<div>
							<span class="icon fa-cloud"></span>
							<h3>Patient Records</h3>
                                                        <p><a href="records.php">Click me</a></p>
						</div>

						<div>
							<span class="icon fa-user"></span>
							<h3>Faculty</h3>
                                                        
                                                        <p><a  href="faculty.php?check=1">check</a></p>
                                                        
						</div>

					</div>

					<footer>
						<a href="register.php" class="button">Get Started</a>
					</footer>
				</div>
			</section>


		<!-- Three -->
			<section id="three" class="wrapper align-center">
				<div class="inner">
					<div class="flex flex-2">
						<article>
							<div class="image round">
								<img src="images/pic01.jpg" alt="Pic 01" />
							</div>
							<header>
                                                            <h3>Ambulance<br /></h3>
							</header>
                                                    <p>The term ambulance comes from the Latin word "ambulare"<br> as meaning "to walk or move about"[3]<br> which is a reference to early medical care where<br> patients were moved by lifting or wheeling.</p>
							<footer>
								<a href="https://en.wikipedia.org/wiki/Ambulance" class="button">Learn More</a>
							</footer>
						</article>
						<article>
							<div class="image round">
								<img src="images/pic02.jpg" alt="Pic 02" />
							</div>
							<header>
								<h3>Hospital</h3>
							</header>
                                                    <p>A hospital is a health care institution providing<br> patient treatment with specialized medical and nursing<br> staff and medical equipment.</p>
							<footer>
								<a href="https://en.wikipedia.org/wiki/Hospital" class="button">Learn More</a>
							</footer>
						</article>
					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				
					<div class="copyright">
                                            <h4>&copy; <a href="https:\\www.audenberg.com" class="logo"><strong>Powered</strong> by AudenBerg Technologies</a>
                                            </h4>
                                        </div>

				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>