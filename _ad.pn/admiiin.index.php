<?PHP
session_start();
@header("Content-Type: text/html; charset=windows-1256");
$table_folder=array(
/* html => */"templates" => "templates_islam/",
/* admin => includes => */"include" => "includes_islames/",
/* styles => */ "styles" =>"styles_f/",
                     "img"=>"images/",
                 "ic"=>"icons/",
                "sm"=>"smilles/",
              "img_st"=>"style_image/",
                 "f_medal"=>"medals/",
                "f_logo"=>"forum_logo/",
				"captcha"=>"captcha/",
				"admin"=>"idara_is_printforum/"
				);
@include("../{$table_folder["include"]}conection.database.php");
@include("../{$table_folder["include"]}class.core.php");
@include("../{$table_folder["include"]}function.islamnet.php");
if(protection($_COOKIE["administrator"]) == "loged"){
 $icons = $table_folder["styles"].$table_folder["img"].$table_folder["ic"];
################################### GET #########################################
$admini = @protection_simple($_GET['admini']);
$cat = @protection_simple($_GET['cat']);
$forum = @protection_simple($_GET['forum']);
$cat_num = @intval($_GET['idc']);
$frm_num = @intval($_GET['idf']);
$sprmem = @intval($_GET['sprmem']);
$fun =  @protection($_GET['fun']);
$moderator = @intval($_GET["moderator"]);
$visorf = @protection($_GET['visorf']);
$pub = @protection($_GET['pub']);
$topic = @intval($_GET['topic']);
$pg = @intval($_GET["pg"]);
#################################################################################
if(level_is()=="96"){
@include("templates/home_adm.html");
}else{
echo '<META http-equiv="refresh" content="0; URL=../islam.php" ></META>'; 
}
}else{
echo '<META http-equiv="refresh" content="0; URL=../islam.php" ></META>'; 

}
session_write_close();
?>