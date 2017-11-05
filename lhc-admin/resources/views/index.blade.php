<!DOCTYPE html>
<html>
	<head>
		<title>五合彩</title>
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
	</head>
	<body class="body-background font-size-2rem">
		<div class="yellow-header">最近开奖</div>
		<div>
			<div class="width-100">
				<img class="width-100" src="image/banner.png" alt="">
			</div>
			<div class="width-100 center">
				<!-- 开奖div -->
				<div class="width-100 kaijiang clearfix">
					<div class="kaijiang-top-div width-100 center">
						<span class="kaijiang-title vertical-center">第123期开奖结果</span>
						<a href="/getLittery"><img class="kaijiang-title-image" src="image/zhibo.png"></a>
					</div>
					<!-- 球形列表 -->
					<div class="center">
						<div class="bell-center">
							@foreach ($bell as $item)
								<div class="center float-left kaijiang-ball-content">
									<span class="float-left">
										<div><img src="@bell_path($item)" alt="" class="bell"></div>
										<div><span class="bell-below-font">@bell_name($item)</span></div>
									</span>
								</div>
							@endforeach
							<div class="float-left plus kaijiang-ball-content">
								+
							</div>
							<div class="center float-left width-37 kaijiang-ball-content">
								<span class="">
									<div><img src="@bell_path($special_bell)" alt="" class="bell"></div>
									<div><span class="bell-below-font">@bell_name($special_bell)</span></div>
								</span>
							</div>
						</div>
					</div>
				</div>
				
				<div class="datatime-pannel width-100 center">
					<div class="datatime-span orange radius-25">第{{$id}}期 {{$time}} 21点31分 {{$week}}</div>
				</div>
				<div class="width-100">
					<img class="width-100" src="image/banner2.png">
				</div>
				<div class="width-100">
					<div class="below-title-div">
						<div class="below-title float-left">{{$time}} 第 {{$id}} 期推荐</div>
						<img class="huo" src="image/huo.png" alt="">
					</div>
					<div class="below-content-div">
						<div class="below-span">{{$recommend[0]}}</div>
						<div class="below-span">{{$recommend[1]}}</div>
					</div>
					<div class="below-content-div">
						<div class="below-span">{{$recommend[2]}}</div>
						<div class="below-span">{{$recommend[3]}}</div>
					</div>
					<div class="below-content-div">
						<div class="below-span">{{$recommend[4]}}</div>
						<div class="below-span">{{$recommend[5]}}</div>
					</div>
				</div>
			</div>
		</div>
		
		<div style="width: 100%;height: 60px;"></div>
		<div class="below-content-div width-100 mune">
			<div class="mune-grow">
				<a href="#">
					<div class="mune-item">
						<img src="image/1.png">
					</div>
					<div class="mune-item">
						开奖
					</div>
				</a>
			</div>
			<div class="mune-grow">
				<a href="/list">
					<div class="mune-item">
						<img src="image/2.png">
					</div>
					<div class="mune-item">
						记录
					</div>
				</a>
			</div>
			{{-- <div class="mune-grow">
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