<?PHP
/*
 * PRINT FORUM V 0.1 
 * Powred By MR-O : Abdolahe Ibne Abdel hakime
 * Started At : 18/07/2011 , time -> 10:48
 */


  class files_ifelse{
     
  function topfr(){
global $forum,$cat_id_frm;
if(level_is()>0){
if(level_is()=="96" OR level_is() == "55" and member_on("id") == supervisor($cat_id_frm,"cat","memberid") OR level_is() == "14" and forum_moderator($forum) == true OR member_on("id") == supervisor($forum,"forum","memberid")){
return True ;
 }else{
 return false ;
 }
}else{
return 0;
}
}
  function repcond(){
  global $topic ;
  if(level_is()>0){
if(level_is()=="96" OR level_is() == "55" and member_on("id") == supervisor(findcat($topic,"cat"),"cat","memberid") OR level_is() == "14" and forum_moderator(findcat($topic,"forum")) == true OR member_on("id") == supervisor(findcat($topic,"forum"),"forum","memberid")){
return True ;
 }else{
 return false ;
 }
}else{
return 0;
}
  }
  
  
  }


?>