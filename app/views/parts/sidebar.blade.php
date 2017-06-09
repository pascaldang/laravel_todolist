<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="{{ asset("AdminLTE-2.3.11/dist/img/user2-160x160.jpg")}}" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="header">MAIN NAVIGATION</li>
			<li class="active treeview">
				<a href="/">
					<i class="fa fa-dashboard"></i> <span>Accueil</span>
				</a>
			</li>
			<li>
				<a href="/index.php/todo">
					<i class="fa fa-calendar"></i> <span>ToDoList</span>
				</a>
			</li>
			@if(!Auth::check())
			<li>
				<a href="/index.php/login">
					<i class="fa fa-calendar"></i> <span>Login</span>
				</a>
			</li>
			<li>
				<a href="/index.php/register">
					<i class="fa fa-calendar"></i> <span>Register</span>
				</a>
			</li>
			@endif
			@if(Auth::check())
			<li>
				<a href="/index.php/profile">
					<i class="fa fa-envelope"></i> <span>Profil</span>
				</a>
			</li>
			<li>
				<a href="/index.php/logout">
					<i class="fa fa-calendar"></i> <span>Logout</span>
				</a>
			</li>
			@endif
	</section>
	<!-- /.sidebar -->
</aside>
