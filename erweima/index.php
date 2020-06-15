<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title></title>

		<script src="js/jquery-1.8.3.min.js"></script>
		<style>
			html{
				height:100%;
			}
			body {
				height:100%;
				background: url(image/bg0.png) no-repeat;
				overflow='hidden';
				margin: 0px;
				background-size: 100% 100%;
				background-attachment: fixed;
			}
			
			* {
				padding: 0;
				margin: 0;
			}
			
			.container {
				max-width: 800px;
				margin: 0 auto;
			}
			
			.slide {
				width: 100%;
				min-height: 180px;
				overflow: hidden;
				position: relative;
			}
			
			.slide .img {
				overflow: hidden;
				position: absolute;
				transition: width 0.4s, height 0.4s, top 0.4s, left 0.4s, z-index 0.4s;
			}
			
			.slide .img img {
				width: calc(100% - 14px);
				height: calc(100% - 14px);
				margin: 7px;
			}
			
			.slide .img1 {
				width: 40%;
				height: 40%;
				top: 30%;
				left: -50%;
				z-index: 1;
			}
			
			.slide .img2 {
				width: 60%;
				height: 60%;
				top: 20%;
				left: -20%;
				z-index: 2;
			}
			
			.slide .img3 {
				width: 80%;
				height: 80%;
				top: 10%;
				left: 10%;
				z-index: 3;
			}
			
			.slide .img4 {
				width: 60%;
				height: 60%;
				top: 20%;
				left: 60%;
				z-index: 2;
			}
			
			.slide .img5 {
				width: 40%;
				height: 40%;
				top: 30%;
				left: 110%;
				z-index: 1;
			}
			
			.slide-bt {
				position: absolute;
				left: 50%;
				bottom: 13%;
				z-index: 10;
			}
			
			.slide-bt span {
				width: 24px;
				height: 8px;
				background: #c9caca;
				float: left;
				margin: 5px;
				border-radius: 4px;
			}
			
			.slide .slide-bt .on {
				background: #ffd200;
			}
			
			button {
				width: 80px;
				margin: 20px;
			}
		</style>

	</head>

	<body>
		<?php
		$image1=$_GET['image1'];
		$image2=$_GET['image2'];
		$image3=$_GET['image3'];
		$image4=$_GET['image4'];
		$image5=$_GET['image5'];
		?>
		<div class="container">
			<div id="slide" class="slide" class="index-slide" alt="star">
				<!-- 轮播图片数量可自行增减 -->
				<div class="img"><img src="<?php echo $image1;?>" id="img1" /></div>
				<div class="img"><img src="<?php echo $image2;?>" id="img2" /></div>
				<div class="img"><img src="<?php echo $image3;?>" id="img3" /></div>
				<div class="img"><img src="<?php echo $image4;?>" id="img4" /></div>
				<div class="img"><img src="<?php echo $image5;?>" id="img5" /></div>

				<div class="slide-bt"></div>
			</div>
			<div style="text-align: center;">
				<button id="savePicture" style="width:200px;height:50px;line-height:45px;border:1px solid #c378bb;border-radius:25px;background-color: transparent;color:#c378bb;font-size:16px">长按图片生成海报</button>
			</div>
		</div>
		<!-- 弹窗 -->
		<div id="myModal" class="modal">
		 
		  <!-- 关闭按钮 -->
		  <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
		 
		  <!-- 弹窗内容 -->
		  <img class="modal-content" id="img01">
		 
		  <!-- 文本描述 -->
		  <div id="caption"></div>
		</div>

		<script>
			var autoLb = false; //autoLb=true为开启自动轮播
			var autoLbtime = 1; //autoLbtime为轮播间隔时间（单位秒）
			var touch = true; //touch=true为开启触摸滑动
			var slideBt = true; //slideBt=true为开启滚动按钮
			var slideNub; //轮播图片数量
			var curImg = 1;
			//窗口大小改变时改变轮播图宽高
			var imgSrs = ['<?php echo $image1;?>','<?php echo $image2;?>','<?php echo $image3;?>','<?php echo $image4;?>','<?php echo $image5;?>']
			var curImgSrc = "<?php echo $image1;?>" ;
			$(window).resize(function() {
				$(".slide").height($(".slide").width() * 1.6);
			});

			$(function() {
				$(".slide").height($(".slide").width() * 1.5);
				slideNub = $(".slide .img").size(); //获取轮播图片数量
				for(i = 0; i < slideNub; i++) {
					$(".slide .img:eq(" + i + ")").attr("data-slide-imgId", i);
				}

				//根据轮播图片数量设定图片位置对应的class
				if(slideNub == 1) {
					for(i = 0; i < slideNub; i++) {
						$(".slide .img:eq(" + i + ")").addClass("img3");
					}
				}
				if(slideNub == 2) {
					for(i = 0; i < slideNub; i++) {
						$(".slide .img:eq(" + i + ")").addClass("img" + (i + 3));
					}
				}
				if(slideNub == 3) {
					for(i = 0; i < slideNub; i++) {
						$(".slide .img:eq(" + i + ")").addClass("img" + (i + 2));
					}
				}
				if(slideNub > 3 && slideNub < 6) {
					for(i = 0; i < slideNub; i++) {
						$(".slide .img:eq(" + i + ")").addClass("img" + (i + 1));
					}
				}
				if(slideNub >= 6) {
					for(i = 0; i < slideNub; i++) {
						if(i < 5) {
							$(".slide .img:eq(" + i + ")").addClass("img" + (i + 1));
						} else {
							$(".slide .img:eq(" + i + ")").addClass("img5");
						}
					}
				}

				//根据轮播图片数量设定轮播图按钮数量
				if(slideBt) {
					for(i = 1; i <= slideNub; i++) {
						$(".slide-bt").append("<span data-slide-bt='" + i + "' onclick='tz(" + i + ")'></span>");
					}
					$(".slide-bt").width(slideNub * 34);
					$(".slide-bt").css("margin-left", "-" + slideNub * 17 + "px");
				}

				//自动轮播
				if(autoLb) {
					setInterval(function() {
						right();
					}, autoLbtime * 1000);
				}

				if(touch) {
					k_touch();
				}
				slideLi();
				imgClickFy();
			})

			//右滑动
			function right() {
				var fy = new Array();
				for(i = 0; i < slideNub; i++) {
					fy[i] = $(".slide .img[data-slide-imgId=" + i + "]").attr("class");
				}
				for(i = 0; i < slideNub; i++) {
					if(i == 0) {
						$(".slide .img[data-slide-imgId=" + i + "]").attr("class", fy[slideNub - 1]);
					} else {
						$(".slide .img[data-slide-imgId=" + i + "]").attr("class", fy[i - 1]);
					}
				}
				imgClickFy();
				slideLi();
				if(curImg == 5) {
					curImg = 1
				} else {
					curImg++;
				};
				curImgSrc =  imgSrs[curImg - 1]
				console.log(curImgSrc);
			}

			//左滑动
			function left() {
				var fy = new Array();
				for(i = 0; i < slideNub; i++) {
					fy[i] = $(".slide .img[data-slide-imgId=" + i + "]").attr("class");
				}
				for(i = 0; i < slideNub; i++) {
					if(i == (slideNub - 1)) {
						$(".slide .img[data-slide-imgId=" + i + "]").attr("class", fy[0]);
					} else {
						$(".slide .img[data-slide-imgId=" + i + "]").attr("class", fy[i + 1]);
					}
				}
				imgClickFy();
				slideLi();

				if(curImg == 1) {
					curImg = 5
				} else {
					curImg--;
				};
				curImgSrc =  imgSrs[curImg - 1]
				console.log(curImgSrc);
			}

			//轮播图片左右图片点击翻页
			function imgClickFy() {
				$(".slide .img").removeAttr("onclick");
				$(".slide .img2").attr("onclick", "left()");
				$(".slide .img4").attr("onclick", "right()");
			}

			//修改当前最中间图片对应按钮选中状态
			function slideLi() {
				var slideList = parseInt($(".slide .img3").attr("data-slide-imgId")) + 1;
				$(".slide-bt span").removeClass("on");
				$(".slide-bt span[data-slide-bt=" + slideList + "]").addClass("on");
			}

			//轮播按钮点击翻页
			function tz(id) {
				var tzcs = id - (parseInt($(".slide .img3").attr("data-slide-imgId")) + 1);
				if(tzcs > 0) {
					for(i = 0; i < tzcs; i++) {
						setTimeout(function() {
							right();
						}, 1);
					}
				}
				if(tzcs < 0) {
					tzcs = (-tzcs);
					for(i = 0; i < tzcs; i++) {
						setTimeout(function() {
							left();
						}, 1);
					}
				}
				slideLi();
			}

			//触摸滑动模块
			function k_touch() {
				var _start = 0,
					_end = 0,
					_content = document.getElementById("slide");
				_content.addEventListener("touchstart", touchStart, false);
				_content.addEventListener("touchmove", touchMove, false);
				_content.addEventListener("touchend", touchEnd, false);

				function touchStart(event) {
					var touch = event.targetTouches[0];
					_start = touch.pageX;
				}

				function touchMove(event) {
					var touch = event.targetTouches[0];
					_end = (_start - touch.pageX);
				}

				function touchEnd(event) {
					if(_end < -100) {
						left();
						_end = 0;
					} else if(_end > 100) {
						right();
						_end = 0;
					}
				}
			}

			$("#savePicture").click(function(){
				
				downloadIamge(curImgSrc,"img");
			})

			function downloadIamge(imgsrc, name){
			  let image = new Image();
			  // 解决跨域 Canvas 污染问题
			  image.setAttribute("crossOrigin", "anonymous");
			  image.onload = function() {
			    let canvas = document.createElement("canvas");
			    canvas.width = image.width;
			    canvas.height = image.height;
			    let context = canvas.getContext("2d");
			    context.drawImage(image, 0, 0, image.width, image.height);
			    let url = canvas.toDataURL("image/png"); //得到图片的base64编码数据
			    let a = document.createElement("a"); // 生成一个a元素
			    let event = new MouseEvent("click"); // 创建一个单击事件
			    a.download = name || "photo"; // 设置图片名称
			    a.href = url; // 将生成的URL设置为a.href属性
			    a.dispatchEvent(event); // 触发a的单击事件
			  };
			  image.src = imgsrc;
			}
		</script>
	</body>

</html>