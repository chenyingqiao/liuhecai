<!DOCTYPE html>
<html>
	<head>
		<title>开奖</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<style type="text/css">
			.background{
				width:80%;
				/*border:10px #000 solid;*/
				/*margin:0 auto;*/
			}
			.image-content{
				width: 100%;
				text-align: center;
				position: absolute;
				top: 10%;
			}
			.size{
				width: 13%;
				height:13%;
			}
		</style>
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	</head>
	<body style="margin: 0px;background:#fff;">
		@if (!$show)
			<div style="position: absolute; top: 45%; text-align: center;width: 100%;color:#000;font-size: 1.7rem;">摇奖还未开始，9.30准时开始</div>
		@endif
		@if ($show)
			<div class="image-content">
				<div><img src="image/video1.gif" id="yaojianggif" class="background"></div>
				<div id="tishi" style="text-align: center;width: 100%;color:#000;font-size: 1.7rem;">摇奖结果</div>
				<div style="background-color:#fff;padding-top: 4px;;">
					@foreach ($bells as $key=>$element)
						<span><img src="{{$element}}" class="size" id="bell{{$key}}" alt=""></span>
					@endforeach
				</div>
			</div>
			<script type="text/javascript">
				$(function(){
					$("img[id^='bell']").hide();
					$("#tishi").hide();
					setTimeout(function(){
						$("#bell0").show(500);
					},4000)
					setTimeout(function(){
						$("#bell1").show(500);
					},8000)
					setTimeout(function(){
						$("#bell2").show(500);
					},12000)
					setTimeout(function(){
						$("#bell3").show(500);
					},16000)
					setTimeout(function(){
						$("#bell4").show(500);
					},17000)
					setTimeout(function(){
						$("#bell5").show(500);
					},19000)
					setTimeout(function(){
						$("#bell6").show(500);
						$("#yaojianggif").hide(100);
						$("#tishi").show(1000);
					},23000)
						});
			</script>
		@endif
		
	</body>
</html>