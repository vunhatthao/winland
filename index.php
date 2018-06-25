<?php
	session_start();
	$session=session_id();

	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './admin/lib/');
	
	include_once _lib."Mobile_Detect.php";
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	
	$lang_default = array("","en");
	if(!isset($_SESSION['lang']) or !in_array($_SESSION['lang'], $lang_default))
	{
		@$_SESSION['lang'] = $company['lang_default'];
	}
	$lang=$_SESSION['lang'];

	require_once _source."lang$lang.php";	
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";	
	include_once _lib."class.database.php";
	//include_once _lib."functions_user.php";
	//include_once _lib."functions_giohang.php";
	include_once _lib."file_requick.php";
	include_once _source."counter.php";	

?>
<!doctype html>
<html lang="vi">

<head>
	<base href="http://<?=$config_url?>/" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">   
	<?php include _template."layout/seoweb.php";?>
	<?php include _template."layout/js_css.php";?> 
    <?=$company['codethem']?>       
</head>

<?php include _template."layout/background.php";?>
<body onLoad="<?php if(@$_GET['com']=='lien-he') echo 'initialize();'; ?>" <?=$str_background?>>
<h1 class="vcard fn" style="position:absolute; top:-1000px;"><?php if($title!='')echo $title;else echo $seo['title'];?></h1>
<h2 style="position:absolute; top:-1000px;"><?php if($title!='')echo $title;else echo $seo['title'];?></h2>
<h3 style="position:absolute; top:-1000px;"><?php if($title!='')echo $title;else echo $seo['title'];?></h3>

<?php include _template."layout/pupop.php";?>
<div id="wapper">
	<div id="header">
		<?php include _template."layout/header.php";?>
    </div><!---END #header-->
        <?php include _template."layout/menu_top.php";?>
        <div id="main_content">
        <?php if($source=='index'){ ?>
            <div class="wap-index">
                <?php include _template."layout/slider_jssor.php";?>
            </div>
        <?php } else {?>
            
        <?php } ?>
    </div>
        

        <div class="spmoi_home">
        <?php include _template."layout/spmoi.php";?> 
        </div> 
        <div class="clear"></div>
        <?php if($source=='index') { ?>
            <?php include _template."layout/sanpham_dm.php";?>
            <?php include _template."layout/quangcao.php";?>
        <?php } ?>
    
    <div id="main_content">
        <?php if($source=='index'){ ?>
            <div class="wap-index">
                <?php include _template.$template."_tpl.php"; ?> 
            </div>
        <?php } else {?>
            <div id="right">
            	<?php include _template.$template."_tpl.php"; ?> 
            </div><!---END #right-->
            
            <div id="left">
                <?php include _template."layout/left.php";?>
            </div><!---END #left-->
            <div class="clear"></div>
        <?php } ?>
    </div><!---END #main_content-->
    <?php include _template."layout/dangky.php";?>
        <?php include _template."layout/footer.php";?>
        <?php include _template."layout/phone.php";?>
         <?php include _template."layout/chat_facebook.php";?>
</div><!---END #wapper-->
</body>
</html>