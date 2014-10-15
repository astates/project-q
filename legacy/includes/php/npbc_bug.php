<?php
/* NetPass Build Center "BUG"
 * output an under-construction message that is STUCK to the top of each page of a website
 * project being hosted by the netpassbuildcenter webserver, which reminds users that the
 * site is indeed a work-in-progress and not to expect completion or perfection in the rendering.
 * use "require_once('npbc_bug.php'); to invoke the code in this file typically in the 
 * /includes/header.php file of a project
 */
if(strtolower(substr($_SERVER['SERVER_NAME'],-22)) == 'netpassbuildcenter.com') { ?>
<!-- this div and style block belongs immediately following the <body> (open) tag in the HTML stream -->
<div id="npbc_bug" style="position:fixed;top:0px;left:0px;right:0px;width:100%;height:95px;min-width:1010px;
background:url('http://www.npsrvr.net/images/uc_bg_sml_w_space.jpg') repeat-x;">
<div id="npbc_bug_text" 
style="margin:5px auto 0px;width:700px;background-color:rgba(0, 112, 255, 0.80);
background:url('http://www.npsrvr.net/images/ucText_bg.png') repeat;
color:black;text-align:center;font-weight:bold;font-family:Helvetica,Verdana,Arial,sans-serif;font-size:13pt">
<!--&nbsp; <?php print($_SERVER['SERVER_NAME']); ?> &nbsp;<br / -->
&nbsp; Another Quality NetPass Online Product Coming Soon. &nbsp;<br />
&nbsp; This area is under construction. Content may be incomplete or inoperable. &nbsp;<br />
&nbsp; <span style="font-size:smaller;">Need Immediate Assistance? E-Mail 
<a href="mailto:production@netpass.com" id="npbc_bug_email">production@netpass.com</a></span> &nbsp;
</div>
</div>
<style type="text/css">
#npbc_bug_email {color:black;}
#npbc_bug_email:hover {color:#666;}
body {margin-top:95px !important;} /* this reserves the space at the top of the browser window so npbc bug won't obscure legit content */
</style>
<?php
}
?>