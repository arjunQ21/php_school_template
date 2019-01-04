<?php 



$topLinks = ["Principal's Desk",'Prayers','Affiliation','News Letter', "Magazine"];
$icons = ['fab fa-facebook-f','fab fa-twitter','fab fa-instagram'];
$navLinks = ["Home",'About Us>','Features>','Admission>','Gallery','Calendar','Notice','Downloads>','Contact Us', "Sign Up#sign_up_button"];
const downIcon = 'fas fa-angle-down downIcon';
$currentNotice = [] ;
$currentProcess = [] ;
$currentFeature = [] ;
const processes = [
	[
		'background'=>'#F1C410',
		'image'=>'images/process1.jpg',
		'title'=>'Admission',
		'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque suscipit, repellendus explicabo...'
	],
	[
		'background'=>'#01245B',
		'image'=>'images/process2.jpg',
		'title'=>'Infrastructure',
		'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque suscipit, repellendus explicabo...'
	],
	[
		'background'=>'#3C6599',
		'image'=>'images/process3.png',
		'title'=>'Affiliation',
		'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque suscipit, repellendus explicabo...'
	]		
];

?>
<!DOCTYPE html>
<html>
<head>
	<title>GyanSarowar Academy</title>
	<meta name='viewport' content = 'width=device-width'>
	<link rel='stylesheet' href='fonts/fonts.css'>
	<link rel="stylesheet" href="fonts/fontawesome/css/all.min.css">
	<link rel='stylesheet' href="css/style.css">
	<script src='js/jquery-3.2.1.js'></script>
</head>
<body>
<div class="topBar">
	<div class="items_cont">
		<div class="top_links_cont">
			<?php foreach($topLinks as $tls): ?>
				<div class="top_links_item">
					<?=$tls?>
				</div>
			<?php endforeach ?>	
		</div>
		<div class="top_social">
			<?php foreach($icons as $ics): ?>
				<i class='<?=$ics?>' style=''></i>
			<?php endforeach ?>			
		</div>
	</div>
</div>
<div class="navBar">
	<div class="nav_items_cont" style=''>
		<div class="logo_cont">
			<img src="images/logo.png">
		</div>
		<div class="nav_links_cont">
			<?php foreach($navLinks as $navs): ?>
				<a class="nav_links_item" href="#">
					<?php 
						$hasCaret = false ;
						$hasId = false ;
						if($navs[strlen($navs) - 1] == ">"){
							$navs = substr($navs, 0, strlen($navs) - 1);
							$hasCaret = true ;	
						}
						if(strrpos($navs, '#')){
							$hasTagAt = strpos($navs, "#");
							$elementId = substr($navs, $hasTagAt + 1);
							$navs = substr($navs, 0, $hasTagAt);
							$hasId = true ;
						}
					?>
					<?php 
						if($hasId){
							echo "<span id='$elementId' style='padding:5px 20px; background: #028FCC; color: #fff !important; border-radius: 2px; border: 1px solid #888;'>$navs</span>";
							// continue ;
						}
					?>
					<?php if(!($hasId)) echo $navs; ?>
					<?php if($hasCaret && ( !($hasId) )): ?>
						<i class = '<?=downIcon?>'></i>
					<?php endif ?>
				</a>
			<?php endforeach ?>				
		</div>
	</div>
</div>

<div class="slider_cont">
	<div class="slider_options_cont">
		<div class="relDiv">
			<div class="prev_image slider_options">
				<i class='fas fa-chevron-left slider_icons' id='previous'></i>
			</div>
			<div class="next_image slider_options">
				<i class='fas fa-chevron-right slider_icons' id='next'></i>
			</div>			
		</div>
	</div>
	<script>
		let images = ['1.jpg','2.jpg','3.jpg','4.jpg','../school.jpg'];
		let imageDir = "images/slides/";
		let toShow = 0 ;
		// let lastShown = +new Date();
		let intrvl;
		let timeout;



		function showIndex(index){
			if( !(index < images.length)){
				index = 0;
			}
			// console.log("Showing image at index: "+ index);
			// $("div.slider_cont").css("visibility",'hidden');
			// $("div.slider_cont").css("background-image", "url('"+imageDir + images[index]+"')");
			// $("div.slider_cont").css("visibility",'visible');
			$("div.slider_cont").fadeOut(400, function(){
				$("div.slider_cont").css("background-image", "url('"+imageDir + images[index]+"')");
				$(this).fadeIn(400);
			});
			
			// lastShown = +new Date();
		}
		function find(option = 'next'){
			// let final ; 
			if(option == 'next'){
				toShow ++ ;
				toShow = toShow % images.length ;
			}else{
				toShow -- ;
				if(toShow < 0){
					toShow = images.length - 1 
				}
					// final = toShow ;
			}
			return toShow ;
		}
		function showNext(){
			showIndex(find('next'));
		}
		function showPrevious(){
			showIndex(find('previous'));
		}
		function continueShowing(){
			// clearTimeout(timeout);
			clearInterval(intrvl);
			intrvl = setInterval(function(){
				showNext();
			}, 5000);			
		}
		function waitChanging(){
			// clearInterval(intrvl);
			setTimeout(function(){
				continueShowing();
			}, 5000);
		}
		function showModal(){
			$("div.signup").fadeIn(700);
		}
		function hideModal(){
			$("div.signup").fadeOut(700);
		}		
		$(document).ready(function(){
			showIndex(0);
			continueShowing();
			$("i#previous").click(function(){
				waitChanging();
				showPrevious();
			});
			$("i#next").click(function(){
				waitChanging();
				showNext();
			});
			//signup button
			$("span#sign_up_button").click(function(){
				showModal();
			});
			$("div.cancel").find("span").click(function(){
				hideModal();
			});
		});
	</script>
</div>

<div class="items_cont">
<div class="about_notice">
	<div class="about_cont">
		<div class="title">
			About This school
		</div>
		<div class="about_body">
			<div class="about_image_cont">
				<img src="images/school.jpg">
			</div>
			<div class="about_text">
				<p>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
				</p>
			</div>
		</div>
	</div>
	<div class="notice_cont">
		<div class="title">
			Notices
		</div>
		<div class="notices">
			<?php 
				$notices = json_decode(file_get_contents("notices.json"), true);
				// print_r($features);
				foreach($notices as $ns){
					showNotice($ns);
				}
			?>
		</div>
	</div>
</div>
</div>

<div class="processes_cont">
	<div class="title">
		Processes
	</div>
	<div class="processes" >	
		<?php 
			foreach(processes as $proc){
				showProcess($proc);
			}
		?>
	</div>
</div>	
<div class="features_cont">
	<div class="title">
		Features
	</div>
	<div class="features" >
		<?php 

		$features = json_decode(file_get_contents("features.json"), true);
		// print_r($features);
		foreach($features as $fs){
			showFeature($fs);
		}
		?>
	</div>
</div>

<div class="title">
	Why Choose Us?
</div>

<div class="img_bg" style='margin-bottomd: e0px !imrwportant'>
	<div class="img_contents_cont">
		<div class="image_content">
			<div class="icon_bg" style='background: #2ECB71'>
				<i class ="fas fa-building img_icons"></i>
			</div>
			<a class="image_content_title">
				Proficient Infrastructure
			</a>
			<div class="image_content_description">
				Better school infrastructure can boost students' learning and can have a big impact on students.
			</div>
		</div>
		<div class="image_content">
			<div class="icon_bg" style='background: #1AB034'>
				<i class ="fas fa-users img_icons"></i>
			</div>
			<a class="image_content_title">
				Excellent Faculty
			</a>
			<div class="image_content_description">
				Teachers are students' role models. Efficient and Effective teachers can have an enriching effect on...
			</div>
		</div>
		<div class="image_content">
			<div class="icon_bg" style='background: #FED033'>
				<i class ="fas fa-tree img_icons"></i>
			</div>
			<a class="image_content_title">
				Organized Environment
			</a>
			<div class="image_content_description">
				One excellent way to support better learning in school is to provide the students with a clean and w...
			</div>
		</div>
	</div>
</div>
<!-- <hr> -->
<div class="footer" style='margin-top:0px !important'>
	<div class="footer_desc">
		<h3>
			About Us
		</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ducimus, nemo corrupti voluptas ea! Placeat!</p>
		<br><br><br><br><br><br><br>
		<p class="by" style='color: #fff'>
			Designed by Arjun Adhikari
		</p>
	</div>
	<div class="footer_contact">
		<h3>Contact Us</h3>
		<div class="main_contact">
			<div class="contact_icons">
				<i class="fas fa-home"></i>
			</div>
			<div class="contact_description">
				G.P.O. Box No: 1497, Kathmandu, Nepal
			</div>
			<div class="contact_icons">
				<i class="fas fa-phone"></i>
			</div>
			<div class="contact_description">
				Phone: 014330088 , 014330163, 01-4331690
			</div>
			<div class="contact_icons">
				<i class="fas fa-at"></i>
			</div>
			<div class="contact_description">
				Email: info@misktm.edu.np
			</div>
		</div>
	</div>
	<div class="footer_form">
		<form><h3>Feedback Form</h3>
			<div class="form_elements">
				<!-- <div class="form_label">Name:</div> -->
				<input type='text' placeholder="Name">
			</div>
			<div class="form_elements">
				<!-- <div class="form_label">Email:</div> -->
				<input type='email' placeholder="Email">
			</div>
			<div class="form_elements">
				<!-- <div class="form_label">Message:</div> -->
				<textarea type='textarea' placeholder="Message"></textarea>
			</div>
			<div class="form_elements">
				<button type='submit' value='Send'>Send</button>
			</div>									
		</form>
	</div>
</div>

<div class="signup">
	<div class="main_signup">
		<div class="cancel" style='float:right;padding:20px;'><span style='padding:5px 10px; border-radius: 4px; background:#F47378; border: 1px solid #9D1117;cursor: pointer; color: #fff;' >Cancel</span></div>
		<h2 class='form-title'>Sign Up</h2>

		<form action='#' method='POST'>
			<div class="form_elements">
				<!-- <div class="form_label">Name: </div> -->
				<input type="text" name="name" placeholder="Name">
			</div>
			<div class="form_elements">
				<!-- <div class="form_label">Email: </div> -->
				<input type="email" name="email" placeholder="Email">
			</div>
			<div class="form_elements">
				<!-- <div class="form_label">Password: </div> -->
				<input type="password" name="password" placeholder="Password">
			</div>
			<div class="form_elements">
				<button type='submit' style='background: #ccc'> Sign Up</button>
			</div>									
		</form>
	</div>
</div>

<?php 
function showNotice($settings){
	$defaults = [
		// "icon"=>"fab fa-facebook-f",
		"title"=>'Notice',
		"description"=>"… May I have your attention, please? 
							Will the real Slim Shady please stand up? 
							I repeat, will the real Slim Shady please stand up? 
							We're gonna have a problem here..",
		"date"=>"19 Sep 2017"
		// "hover"=>'#999'
	];
	global $currentNotice;
	$currentNotice = array_merge($defaults, $settings) ;
	require "templates/notice.php";	
}

function showProcess($settings){
	$defaults = [
		'background'=>'#F1C410',
		'image'=>'images/1.jpg',
		'title'=>'Admission',
		'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque suscipit, repellendus explicabo...'
	] ;
	global $currentProcess;
	$currentProcess = array_merge($defaults, $settings) ;
	require "templates/process.php";
}

function showFeature($settings){
	$defaults = [
		"icon"=>"fab fa-facebook-f",
		"title"=>'facebook',
		"description"=>'we are a social network',
		"background"=> "#aaa",
		// "hover"=>'#999'
	];
	global $currentFeature;
	$currentFeature = array_merge($defaults, $settings) ;
	require "templates/feature.php";	
}

?>

</body>
</html>