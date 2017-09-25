
<html>
<!--[if lt IE 7]>    <html lang="en-US" dir="ltr" class=" lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>       <html lang="en-US" dir="ltr" class="lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>       <html lang="en-US" dir="ltr" class="lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]>       <html lang="en-US" dir="ltr" class="lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en-US" dir="ltr" class="no-ie"> <!--<![endif]-->
<head>
	<!--[if IE]>
	<meta http-equiv="X-UA-Compatible" content="IE=9,chrome=1" />
	<![endif]-->
	<meta charset="UTF-8" />
	<title>图书详情</title>
	<meta name="viewport" content="width=600" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	<meta name="format-detection" content="telephone=no" />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,700' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="apple-touch-icon" href="apple-touch-icon.png" />
	<link rel="apple-touch-icon-precomposed" href="apple-touch-icon.png" />
	<!-- ColorBox Theme, you can use example1 - example5 -->
	<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.3/example1/colorbox.css" />
	<!-- <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.3/example2/colorbox.css" /> -->
	<!-- <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.3/example3/colorbox.css" /> -->
	<!-- <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.3/example4/colorbox.css" /> -->
	<!-- <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.3/example5/colorbox.css" /> -->
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
</head>
<body class="preload impress-not-supported">
<?php
function ConnectDatabase($database){
$con = mysqli_connect("localhost","root","",$database);
if (!$con){
  	die('Could not connect: ' . mysqli_error());
}
  return $con;
}
function CloseDatabase($con){
	 mysqli_close($con);
	 return;
}
?>
	<!--*** Loading animated ***-->
	<div class="loading-panel">
		<div class="loading">
			<div id="loading-gif"></div>
		</div>
	</div>

	<!--*** Menu ***-->
	<div class="container-menu">
		<nav class="mainmenu">
			<ul>
				<li>
					<a class="fg-bgc" href="#profile">
						<span class="img-menu" id="about-ico"></span>
						<span class="txt-menu">图书详情</span>
					</a>
				</li>
				<li>
					<a class="fg-bgc" href="#resume">
						<span class="img-menu" id="resume-ico"></span>
						<span class="txt-menu">馆藏位置</span>
					</a>
				</li>
				<li>
					<a class="fg-bgc" href="#portfolio">
						<span class="img-menu" id="portfolio-ico"></span>
						<span class="txt-menu">相关书籍</span>
					</a>
				</li>
				<li>
					<a class="fg-bgc" href="#contact">
						<span class="img-menu" id="contact-ico"></span>
						<span class="txt-menu">评论区</span>
					</a>
				</li>
				<li>
					<a class="fg-bgc" href="#other">
						<span class="img-menu" id="other-ico"></span>
						<span class="txt-menu">其他</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>

	<!--*** Pages ***-->
	<div id="impress">
		<!--*** Profile ***-->
		<section class="profile_container cover step" id="profile" data-x="0" data-y="0">
			<h1 class="cover"><span class="h1-text fg-bgc">
			<?php 
			$con=ConnectDatabase("library");
			$sql="SELECT `name` FROM `book-information` WHERE `callnumber`='".$_POST["callnumber"]."'";
			//echo $sql;
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($result);
			echo $row["name"];
			CloseDatabase($con);
			?>
			</span><span class="h1-corner fg-bdc"></span></h1>
			<figure class="me left">
				<div id="myqr">扫一扫</div>
				<div id="myimg"></div>
			</figure>
			<section class="personal-info right">
				<!-- Personal info section -->
				<ul>
					<li>
						<div class="label fg-bgc">索书号</div>
						<div class="corner fg-bdc"></div>
						<div class="text"><?php echo $_POST["callnumber"];?></div>
					</li>
					<li>
						<div class="label fg-bgc">作者</div>
						<div class="corner fg-bdc"></div>
						<div class="text"><?php 
			$con=ConnectDatabase("library");
			$sql="SELECT `firstauthor`,`otherauthor` FROM `book-information` WHERE `callnumber`='".$_POST["callnumber"]."'";
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($result);
			echo $row["firstauthor"]." ";
			echo $row["otherauthor"];
			CloseDatabase($con);
			?></div>
					</li>
					<li>
						<div class="label fg-bgc">出版社</div>
						<div class="corner fg-bdc"></div>
						<div class="text"><?php 
			$con=ConnectDatabase("library");
			$sql="SELECT `publisher` FROM `book-information` WHERE `callnumber`='".$_POST["callnumber"]."'";
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($result);
			echo $row["publisher"];
			CloseDatabase($con);
			?></div>
					</li>
					<li>
						<div class="label fg-bgc">出版时间</div>
						<div class="corner fg-bdc"></div>
						<div class="text"><a href="#contact"><?php 
			$con=ConnectDatabase("library");
			$sql="SELECT `publishtime` FROM `book-information` WHERE `callnumber`='".$_POST["callnumber"]."'";
			//echo $sql;
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($result);
			echo $row["publishtime"];
			CloseDatabase($con);
			?></a></div>
					</li>
					<li>
						<div class="label fg-bgc">主题</div>
						<div class="corner fg-bdc"></div>
						<div class="text"><?php 
			$con=ConnectDatabase("library");
			$sql="SELECT `subject1`,`subject2`,`subject3` FROM `book-information` WHERE `callnumber`='".$_POST["callnumber"]."'";
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($result);
			echo $row["subject1"]." ".$row["subject2"];
			CloseDatabase($con);
			?></div>
					</li>
					<li>
						<div class="label fg-bgc">预订人数</div>
						<div class="corner fg-bdc"></div>
						<div class="text"><?php 
			$con=ConnectDatabase("library");
			$sql="SELECT `reservationnumber` FROM `book-information` WHERE `callnumber`='".$_POST["callnumber"]."'";
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($result);
			echo $row["reservationnumber"];
			CloseDatabase($con);
			?></div>
					</li>
				</ul>
			</section>
			<section class="aboutme">
				<hgroup>
					<h2 class="f30">
					<?php 
			$con=ConnectDatabase("library");
			$sql="SELECT `name` FROM `book-information` WHERE `callnumber`='".$_POST["callnumber"]."'";
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($result);
			echo $row["name"];
			CloseDatabase($con);
			?>
			</h2>
					<h2 class="f20">摘要</h2>
				</hgroup>
				<p><?php 
			$con=ConnectDatabase("library");
			$sql="SELECT `abstract` FROM `book-information` WHERE `callnumber`='".$_POST["callnumber"]."'";
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($result);
			echo $row["abstract"];
			CloseDatabase($con);
			?></p>
			</section>
			<a class="dwn-vcard fg-bgc" href="#">下载本书</a>
				<!-- Social Icons -->
			<ul class="social cover">
				<li><a class="facebook" title="Facebook" href="#"></a></li>
				<li><a class="twitter" title="Twitter" href="#"></a></li>
				<li><a class="cs" title="CS" href="#"></a></li>
				<li><a class="tumblr" title="Tumblr" href="#"></a></li>
				<li><a class="google" title="Google" href="#"></a></li>
				<li><a class="linkedin" title="Linkedin" href="#"></a></li>
				<li><a class="rss" title="RSS" href="#"></a></li>
			</ul>
		</section>
		
		<!--*** Resume ***-->
		<section class="resume_container cover step" id="resume" data-x="1000" data-y="-500" data-z="-1500" data-rotate="10" >
			<h1 class="cover"><span class="h1-text fg-bgc">图书详情</span><span class="h1-corner fg-bdc"></span></h1>
			<!-- EXPERIENCE section -->
			<section class="edu left">
				<h2>馆藏位置</h2>
				<ul class="edu-list">
					<?php 
			$con=ConnectDatabase("library");
			$sql="SELECT `copynumber`, `location`, `isborrowed`, `iscircled` FROM `book-location` WHERE `callnumber`='".$_POST["callnumber"]."'";
			$result = mysqli_query($con,$sql);
			while($row = mysqli_fetch_array($result)){
				echo "<li><h3>";
				echo $row["location"];
				echo "</h3>";
				echo "<p>是否流通： ";
				if($row["iscircled"]==1) echo "是&nbsp;&nbsp;&nbsp;";
				else echo "否&nbsp;&nbsp;&nbsp;";
				echo "是否借出： ";
				if($row["isborrowed"]==1) echo "是";
				else echo "否";
				echo "</p>";
				echo "<span>副本号：";
				echo $row["copynumber"];
				echo "</span>";
				echo "</li>";
			}
			
			CloseDatabase($con);
			?>
					
				</ul>
			</section>
			
			<!-- EDUCATION section 
			<section class="job">
				<h2>EDUCATION</h2>
				<ul class="exp-list">
					<li>
						<h3>University of Cambridge</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus egestas erat nunc.</p>
						<span>2004-2008</span>
					</li>
					<li>
						<h3>University of Cambridge</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
						<span>2009-2012</span>
					</li>
				</ul>
			</section>-->

				<!-- SKILLS section -->
			<!--<section class="skills">
				<div class="graph-skill">-->
					<!-- Choose a number between 0 to 100 for your skills -->
					<!--<ul>
						<li class="fig1"><span class="bar-title">100</span></li>
						<li class="fig2"><span class="bar-title">50</span></li>
						<li class="fig3"><span class="bar-title">75</span></li>
						<li class="fig4"><span class="bar-title">35</span></li>
						<li class="fig5"><span class="bar-title">25</span></li>
						<li class="fig6"><span class="bar-title">40</span></li>
					</ul>
				</div>
				<div class="graph-title">
					<ul>-->
						<!-- Choose a test for your skills -->
						<!--<li><span class="graph-lable fig1"></span>HTML5</li>
						<li><span class="graph-lable fig2"></span>CSS3</li>
						<li><span class="graph-lable fig3"></span>1Styls</li>
						<li><span class="graph-lable fig4"></span>JavaScript</li>
						<li><span class="graph-lable fig5"></span>jQuery</li>
						<li><span class="graph-lable fig6"></span>PHP</li>
					</ul>
				</div>
			</section>-->
		</section>

		<!--*** Portfolio 1/2 ***-->
		<section class="portfolio_container portfolio1 cover step" id="portfolio" data-x="-300" data-y="-1200" data-z="-3000">
			<h1 class="cover"><span class="h1-text fg-bgc">Portfolio 1/2</span><span class="h1-corner fg-bdc"></span></h1>
			 <ul class="filter cover">
				<li id="all1">全部</li>
				<li id="cat_01">书籍</li>
				<li id="cat_02">编剧</li>
				<li id="cat_03">海报</li>
			</ul>

			<!-- PORTFOLIO-LIST section -->
			<ul id="portfolio-list" class="cover">
				<li class="cat_01">
					<a class="port_group" href="images/portfolio/1.jpg">
						<img src="images/portfolio/thumb/1.jpg" width="200" height="140" alt="" />
						<span></span>
					</a>
					<h3 class="title">几乎成了英雄</h3>
					<p class="categorie">张嘉佳</p>
				</li>
				<li class="cat_03">
					<a class="port_group" href="images/portfolio/2.jpg">
						<img src="images/portfolio/thumb/2.jpg" width="200" height="140" alt="" />
						<span></span>
					</a>
					<h3 class="title">小夫妻天天恶战</h3>
					<p class="categorie">张嘉佳</p> 
				</li>
				<li class="cat_02">
					<a class="port_group" href="images/portfolio/3.jpg">
						<img src="images/portfolio/thumb/3.jpg" width="200" height="140" alt="" />
						<span></span>
					</a>
					<h3 class="title">情人书</h3>
					<p class="categorie">张嘉佳</p> 
				</li>
				<li class="cat_02">
					<a class="port_group" href="images/portfolio/4.jpg">
						<img src="images/portfolio/thumb/4.jpg" width="200" height="140" alt="" />
						<span></span>
					</a>
					<h3 class="title">刀剑笑</h3>
					<p class="categorie">张嘉佳</p> 
				</li>
				<li class="cat_01">
					<a class="port_group" href="images/portfolio/5.jpg">
						<img src="images/portfolio/thumb/5.jpg" width="200" height="140" alt="" />
						<span></span>
					</a>
					<h3 class="title">从你的全世界路过</h3>
					<p class="categorie">张嘉佳</p> 
				</li>
				<li class="cat_02">
					<a class="port_group" href="images/portfolio/6.jpg">
						<img src="images/portfolio/thumb/6.jpg" width="200" height="140" alt="" />
						<span></span>
					</a>
					<h3 class="title">让我留在你身边</h3>
					<p class="categorie">张嘉佳</p> 
				</li>
				<li class="cat_03">
					<a class="port_group" href="images/portfolio/7.jpg">
						<img src="images/portfolio/thumb/7.jpg" width="200" height="140" alt="" />
						<span></span>
					</a>
					<h3 class="title">摆渡人</h3>
					<p class="categorie">张嘉佳</p> 
				</li>
				<li class="cat_01">
					<a class="port_group" href="images/portfolio/8.jpg">
						<img src="images/portfolio/thumb/8.jpg" width="200" height="140" alt="" />
						<span></span>
					</a>
					<h3 class="title">睡前故事</h3>
					<p class="categorie">张嘉佳</p> 
				</li>
			</ul>
		</section>

		<!--*** Portfolio 2/2 ***-->
		<section class="portfolio_container portfolio2 cover step" id="portfolio2" data-x="-300" data-y="-1200" data-z="-3200" data-rotate-y="180">
			<h1 class="cover"><span class="h1-text fg-bgc">Portfolio 2/2</span><span class="h1-corner fg-bdc"></span></h1>
			 <ul class="filter cover">
				<li id="all2">All</li>
				<li id="cat_05">Art</li>
				<li id="cat_06">WebSite</li>
				<li id="cat_07">Other</li>
			</ul>

			<!-- PORTFOLIO-LIST section -->
			<ul id="portfolio-list2" class="cover">
				<li class="cat_05">
					<a class="port_group" href="images/portfolio/9.jpg">
						<img src="images/portfolio/thumb/9.jpg" width="200" height="140" alt="" />
						<span></span>
					</a>
					<h3 class="title">title about your work</h3>
					<p class="categorie">张嘉佳</p>
				</li>
				<li class="cat_06">
					<a class="port_group" href="images/portfolio/10.jpg">
						<img src="images/portfolio/thumb/10.jpg" width="200" height="140" alt="" />
						<span></span>
					</a>
					<h3 class="title">title about your work</h3>
					<p class="categorie">张嘉佳</p> 
				</li>
				<li class="cat_05">
					<a class="port_group" href="images/portfolio/11.jpg">
						<img src="images/portfolio/thumb/11.jpg" width="200" height="140" alt="" />
						<span></span>
					</a>
					<h3 class="title">title about your work</h3>
					<p class="categorie">张嘉佳</p> 
				</li>
				<li class="cat_06">
					<a class="port_group" href="images/portfolio/12.jpg">
						<img src="images/portfolio/thumb/12.jpg" width="200" height="140" alt="" />
						<span></span>
					</a>
					<h3 class="title">title about your work</h3>
					<p class="categorie">张嘉佳</p> 
				</li>
				<li class="cat_07">
					<a class="port_group" href="images/portfolio/13.jpg">
						<img src="images/portfolio/thumb/13.jpg" width="200" height="140" alt="" />
						<span></span>
					</a>
					<h3 class="title">title about your work</h3>
					<p class="categorie">张嘉佳</p> 
				</li>
				<li class="cat_07">
					<a class="port_group" href="images/portfolio/14.jpg">
						<img src="images/portfolio/thumb/14.jpg" width="200" height="140" alt="" />
						<span></span>
					</a>
					<h3 class="title">title about your work</h3>
					<p class="categorie">张嘉佳</p> 
				</li>
				<li class="cat_05">
					<a class="port_group" href="images/portfolio/15.jpg">
						<img src="images/portfolio/thumb/15.jpg" width="200" height="140" alt="" />
						<span></span>
					</a>
					<h3 class="title">title about your work</h3>
					<p class="categorie">张嘉佳</p> 
				</li>
				<li class="cat_07">
					<a class="port_group" href="images/portfolio/16.jpg">
						<img src="images/portfolio/thumb/16.jpg" width="200" height="140" alt="" />
						<span></span>
					</a>
					<h3 class="title">title about your work</h3>
					<p class="categorie">张嘉佳</p> 
				</li>
			</ul>
		</section>

		<!--*** Contact ***-->
		<section class="contact_container cover step" id="contact" data-x="-1600" data-y="-600" data-z="-4700" data-rotate-z="10" data-rotate-y="180">
			<h1 class="cover"><span class="h1-text fg-bgc">Contact Me</span><span class="h1-corner fg-bdc"></span></h1>
			
			<!-- GOOGLE MAP -->
			<div class="map left">
				<iframe src="map.html"></iframe>
			</div>
			
			<!-- CONTACT FORM -->
			<div class="form">
				<form action="sendmail.php" class="right" id="contact-form" method="post" target='ifrm'>
					<input id="name" placeholder="Name" type="text" name="name" title="访客名称" />
					<input id="mail" placeholder="E-mail" type="text" name="mail" title="邮箱" />
					<textarea id="msg" placeholder="Your Message" name="msg" cols="40" rows="10" title="想说的话"></textarea>
					<input type="submit" value="评论" name="submit" class="fg-bgc" /><span class="corner submit fg-bdc"></span>
				</form>
				<iframe id='ifrm' name='ifrm'></iframe>
				
				<!-- CONTACT INFO -->
				<div class="contact-info right">
					<p id="e-mail">zhujing@pku.edu.cn</p>
					<p id="phone">100-820-8820</p>
					<p id="website">www.sanweishuwu.com</p>
					<p id="address">北京大学信息管理系数据库</p>
				</div>
			</div>
		</section>

		<!--*** Features ***-->
		<section class="feature_container cover step" id="other" data-x="-1600" data-y="-600" data-z="-4500" data-rotate-z="-10">
			<h1 class="cover"><span class="h1-text fg-bgc">我馆特色</span><span class="h1-corner fg-bdc"></span></h1>
			<section class="feature left">
				<h2>主要特色</h2>
				<ul class="feature-list">
					<li>
						<h3>3D 印象动画</h3>
						<p>如果你运用现代的浏览器Chrome浏览器<BR/>那么，你可以看到所有的网页有完整的3D动画。</p>
					</li>
					<li>
						<h3>3D 印象动画</h3>
						<p>如果你运用现代的浏览器Chrome浏览器<BR/>那么，你可以看到所有的网页有完整的3D动画。</p>
					</li>
					<li>
						<h3>3D 印象动画</h3>
						<p>如果你运用现代的浏览器Chrome浏览器<BR/>那么，你可以看到所有的网页有完整的3D动画。</p>
					</li>
					<li>
						<h3>3D 印象动画</h3>
						<p>如果你运用现代的浏览器Chrome浏览器<BR/>那么，你可以看到所有的网页有完整的3D动画。</p>
					</li>
					
				</ul>
			</section>
			
			<section class="more-feature">
				<h2>私人定制</h2>
				<ul class="feature-list">
					<li>
						<h3>定制服务</h3>
						<p>你可以定制任何你想要的服务，只要你有钱</p>
					</li>
					<li>
						<h3>定制服务</h3>
						<p>你可以定制任何你想要的服务，只要你有钱</p>
					</li><li>
						<h3>定制服务</h3>
						<p>你可以定制任何你想要的服务，只要你有钱</p>
					</li><li>
						<h3>定制服务</h3>
						<p>你可以定制任何你想要的服务，只要你有钱</p>
					</li>
				</ul>
			</section>
		</section>

		<!-- If you want to have a overview you can simplay remove the comment -->
		<!-- <section id="overview" class="step" data-x="0" data-y="-600" data-rotate-x="10" data-z="1000"></section> -->
	</div>

	<!--*** SKIN SELECT ***-->
	<div class="skin-selector">
		<a id="toggle-panel" href="#" title="Custom your Site Now!"><img src="images/pin.png" width="26" height="26" alt="" /></a>
		<div class="container-skins">
			<div class="font-color">
				<h3>Choose Color :</h3>
				<ul class="cover">
					<li class="color-white" title="White"></li>
					<li class="color-light-gray" title="Light Gray"></li>
					<li class="color-gray" title="Gray"></li>
					<li class="color-dark-gray" title="Dark Gray"></li>
					<li class="color-black" title="Black"></li>
				</ul>
			</div>
			<div class="style-color">
				<h3>Choose Style :</h3>
				<ul class="cover">
					<li class="default" title="Default"></li>

					<li class="white" title="White"></li>
					<li class="blue-aqua" title="Blue Aqua"></li>
					<li class="blue-cold" title="Blue Cold"></li>
					<li class="blue-soft" title="Blue Soft"></li>
					<li class="blue-dark" title="Blue Aqua"></li>

					<li class="green-dark" title="Green Dark"></li>
					<li class="lime" title="Lime"></li>
					<li class="orange-strong" title="Orange Strong"></li>
					<li class="pink" title="Pink"></li>
					<li class="purple-light" title="Purple Light"></li>

					<li class="green" title="Green"></li>
					<li class="orange-dark" title="Orange Dark"></li>
					<li class="brown-coffee" title="Brown Coffee"></li>
					<li class="green-soft" title="Green Soft"></li>
					<li class="brown-soft" title="Brown Soft"></li>

					<li class="red-dark" title="Red Dark"></li>
					<li class="yellow-soft" title="Yellow Soft"></li>
					<li class="gray-light" title="Gray Light"></li>
					<li class="pink-dark" title="Pink Dark"></li>
					<li class="purple" title="Purple"></li>
				</ul>
			</div>
			<div class="pattern-bg">
				<h3>Choose Pattern :</h3>
				<ul class="cover">
					<li class="pattern-squares" title="Default"></li>
					<li class="pattern-card" title="Card"></li>
					<li class="pattern-arches" title="Arches"></li>
					<li class="pattern-squares2" title="Squares2"></li>
					<li class="tile" title=""></li>

					<li class="tile2" title="Tile2"></li>
					<li class="tile3" title="Tile3"></li>
					<li class="tile4" title="Tile4"></li>
					<li class="pattern-brushed" title="Brushed"></li>
					<li class="pattern-paper" title="Paper"></li>

					<li class="pattern-old-paper" title="Old Paper"></li>
					<li class="pattern-grid" title="Grid"></li>
					<li class="pattern-dots" title="Dots"></li>
					<li class="pattern-lines" title="Lines"></li>
					<li class="pattern-birds" title="Birds"></li>

					<li class="pattern-blueprint" title="Blueprint"></li>
					<li class="pattern-dark" title="Dark"></li>
					<li class="pattern-dark2" title="Dark2"></li>
					<li class="pattern-dark-lines" title="Dark Lines"></li>
					<li class="pattern-carbon" title="Carbon"></li>

					<li class="pattern-carbon2" title="Carbon2"></li>
					<li class="pattern-metal" title="Metal"></li>
					<li class="pattern-wood" title="Wood"></li>

					<li class="blur-home" title="Blur Home"></li>
					<li class="blur-office" title="Blur Office"></li>
					<li class="blur-road" title="Blur Road"></li>

					<li class="blur-balls" title="Blur Balls"></li>
					<li class="blur-bargs" title="Blur Bargs"></li>
					<li class="blur-bubbles" title="Blur Bubbles"></li>
					<li class="blur-cabbage" title="Blur Cabbage"></li>
					<li class="blur-dooks" title="Blur Dooks"></li>
					<li class="blur-focus" title="Blur Focus"></li>
					<li class="blur-frosty" title="Blur frosty"></li>
					<li class="blur-golden" title="Blur golden"></li>
					<li class="blur-leaf" title="Blur leaf"></li>
					<li class="blur-lights" title="Blur lights"></li>
					<li class="blur-maple" title="Blur maple"></li>
					<li class="blur-maple2" title="Blur maple2"></li>
					<li class="blur-nicecolors" title="Blur nicecolors"></li>
					<li class="blur-shoes" title="Blur shoes"></li>
					<li class="blur-suntree" title="Blur suntree"></li>
					<li class="blur-wood" title="Blur wood"></li>
					<li class="greenbf" title="Greenbf"></li>
					<li class="nicecolors" title="Nicecolors"></li>

				</ul>
			</div>
			<div class="color-bg">
				<h3>Choose Background :</h3>
				<ul class="cover">
					<li class="default" title="Default"></li>

					<li class="white" title="White"></li>
					<li class="blue-aqua" title="Blue Aqua"></li>
					<li class="blue-cold" title="Blue Cold"></li>
					<li class="blue-soft" title="Blue Soft"></li>
					<li class="blue-dark" title="Blue Aqua"></li>

					<li class="green-dark" title="Green Dark"></li>
					<li class="lime" title="Lime"></li>
					<li class="orange-strong" title="Orange Strong"></li>
					<li class="pink" title="Pink"></li>
					<li class="purple-light" title="Purple Light"></li>

					<li class="green" title="Green"></li>
					<li class="orange-dark" title="Orange Dark"></li>
					<li class="brown-coffee" title="Brown Coffee"></li>
					<li class="green-soft" title="Green Soft"></li>
					<li class="brown-soft" title="Brown Soft"></li>

					<li class="red-dark" title="Red Dark"></li>
					<li class="yellow-soft" title="Yellow Soft"></li>
					<li class="gray-light" title="Gray Light"></li>
					<li class="pink-dark" title="Pink Dark"></li>
					<li class="purple" title="Purple"></li>
				</ul>
			</div>
		</div>
	</div>

	<!--*** Scripts ***-->
	<script type="text/javascript" src="script/jquery.min.js"></script>
	<!--[if !IE]><!-->
		<script type="text/javascript" src="script/impress.js"></script>
	<!--<![endif]-->
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.3/jquery.colorbox-min.js"></script>
	<script type="text/javascript" src="script/script.js"></script>
</body>
</html>