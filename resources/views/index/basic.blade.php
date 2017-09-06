<!DOCTYPE HTML>
<html>
	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title', '晴空工作室')</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
        <script src="{{ mix('/js/app.js') }}"></script>
	</head>
	<body>
		<section class="hero is-primary">
			<div class="hero-body">
				<div class="container">
					<div class="title"><a href="{{ route('home') }}">晴空工作室人事管理系统</a></div>
					<div class="subtitle">@yield('title')</div>
				</div>
			</div>
		</section>
	@if (session('message-success'))
		<section class="hero is-success">
			<div class="hero-body">
				<div class="container">
					<div class="title">操作成功</div>
					<div class="subtitle">{{ session('message-success') }}</div>
				</div>
			</div>
		</section>
	@endif
	@if (session('message-warning'))
		<section class="hero is-warning">
			<div class="hero-body">
				<div class="container">
					<div class="title">操作似乎有些小问题哦</div>
					<div class="subtitle">{{ session('message-warning') }}</div>
				</div>
			</div>
		</section>
	@endif
	@if (session('message-error'))
		<section class="hero is-danger">
			<div class="hero-body">
				<div class="container">
					<div class="title">操作失败</div>
					<div class="subtitle">{{ session('message-error') }}</div>
				</div>
			</div>
		</section>
	@endif
		<div class="container" style="margin-top: 30px; margin-bottom: 30px; min-height: calc(100vh - 380px);">@yield('main')</div>
		<footer class="footer">
			<div class="container">
				<div class="content has-text-centered">
					<p>Copyright &copy; 2017 <a href="http://www.qkteam.com">QKTeam</a></p>
					<p>
						<a class="icon" target="_blank" href="https://github.com/QKTeam"><i class="fa fa-github"></i></a>
						<a class="icon" target="_blank" href="http://git.qkteam.com"><i class="fa fa-gitlab"></i></a>
					</p>
				</div>
			</div>
		</footer>
    </body>
</html>
