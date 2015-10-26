<!--header start-->
<header class="header white-bg">
	<div class="sidebar-toggle-box">
		<div data-original-title="" data-placement="right" class="fa fa-bars tooltips"></div>
	</div>
	
	<!--logo start-->
	<a href="./" class="logo" >EN<span>SGJ</span></a>
	<!--logo end-->
	
	<div class="nav notify-row" id="top_menu">
		<!--  notification start -->
		<ul class="nav top-menu">
			
			<!-- notification dropdown start-->
			<li id="header_notification_bar" class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">
					<i class="fa fa-bell-o"></i>
					<span class="badge bg-warning">7</span>
				</a>
				<ul class="dropdown-menu extended notification">
					<div class="notify-arrow notify-arrow-yellow"></div>
					<li>
						<p class="yellow">You have new notifications</p>
					</li>
					<li>
						<a href="#">
						<span class="label label-danger"><i class="fa fa-bolt"></i></span>
						Server #3 overloaded.
						<span class="small italic">34 mins</span>
						</a>
					</li>
				</ul>
			</li>
			<!-- notification dropdown end -->
			
		</ul>
	</div>
	<div class="top-nav ">
		<ul class="nav pull-right top-menu">
			<!-- user login dropdown start-->
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">
					<?php if ($_SESSION['en-jk'] == "L") { echo "<img alt='' src='img/avatar-male.jpg'>"; } else { echo "<img alt='' src='img/avatar-female.jpg'>"; } ?>
					<span class="username">&nbsp;<?php echo $_SESSION['en-nama'] ?></span>
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu extended logout">
					<div class="log-arrow-up"></div>
					<li><a data-toggle="modal" href="#modal-sign-out"><i class="fa fa-key"></i> Log Out</a></li>
				</ul>
			</li>
			<!-- user login dropdown end -->
		</ul>
	</div>
</header>
<!--header end-->