<!DOCTYPE html>
<html>
	<head>
		<title>香港麒麟彩票</title>
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
	</head>
	<body class="body-background font-size-2rem">
		<div class="yellow-header">历史开奖记录</div>
		<div class="width-100">
			@foreach ($data as $element)
				<div class="center list-item">
					<div class="list-item-header">
						<span class="list-item-header-span1">第{{$element['id']}}期</span>
						<span class="list-item-header-span2">@week($element['datetime'])</span>
					</div>
					<div class="bell-center width-100">
						<div class="center float-left kaijiang-ball-content">
							<span class="float-left">
								<div><img src="@bell_path($element['key1'])" alt="" class="bell"></div>
								<div><span class="bell-below-font">@bell_name($element['key1'])</span></div>
							</span>
						</div>
						<div class="center float-left kaijiang-ball-content">
							<span class="float-left">
								<div><img src="@bell_path($element['key2'])" alt="" class="bell"></div>
								<div><span class="bell-below-font">@bell_name($element['key2'])</span></div>
							</span>
						</div>
						<div class="center float-left kaijiang-ball-content">
							<span class="">
								<div><img src="@bell_path($element['key3'])" alt="" class="bell"></div>
								<div><span class="bell-below-font">@bell_name($element['key3'])</span></div>
							</span>
						</div>
						<div class="center float-left kaijiang-ball-content">
							<span class="">
								<div><img src="@bell_path($element['key4'])" alt="" class="bell"></div>
								<div><span class="bell-below-font">@bell_name($element['key4'])</span></div>
							</span>
						</div>
						<div class="center float-left kaijiang-ball-content">
							<span class="">
								<div><img src="@bell_path($element['key5'])" alt="" class="bell"></div>
								<div><span class="bell-below-font">@bell_name($element['key5'])</span></div>
							</span>
						</div>
						<div class="center float-left kaijiang-ball-content">
							<span class="">
								<div><img src="@bell_path($element['key6'])" alt="" class="bell"></div>
								<div><span class="bell-below-font">@bell_name($element['key6'])</span></div>
							</span>
						</div>
						<div class="float-left plus kaijiang-ball-content">
							+
						</div>
						<div class="center float-left width-37 kaijiang-ball-content">
							<span class="">
								<div><img src="@bell_path($element['skey'])" alt="" class="bell"></div>
								<div><span class="bell-below-font">@bell_name($element['skey'])</span></div>
							</span>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			@endforeach
		</div>


		<div style="width: 100%;height: 60px;"></div>
		<div class="below-content-div width-100 mune">
			<div class="mune-grow">
				<a href="/">
					<div class="mune-item">
						<img src="image/1.png">
					</div>
					<div class="mune-item">
						开奖
					</div>
				</a>
			</div>
			<div class="mune-grow">
				<a href="#">
					<div class="mune-item">
						<img src="image/2.png">
					</div>
					<div class="mune-item">
						记录
					</div>
				</a>
			</div>
{{-- 			<div class="mune-grow">
				<div class="mune-item">
					<img src="image/4.png">
				</div>
				<div class="mune-item">
					宝典
				</div>
			</div> --}}
		</div>
	</body>
</html>