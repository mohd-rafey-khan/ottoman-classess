<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$username = "xxxxxxxxxxxx";
$password = "xxxxxxxxxxxx";
$from_email = "example@domain.com";
$from_name = "Domain Person Name";

$to = 'example@domain.com';
$cc = 'example@domain.com';
$bcc = 'example@domain.com';
$subject = 'Contact Form';

$host = "email-smtp.us-east-1.amazonaws.com";
$port = xxx;

$thankyou_mail_subject = 'EduKids - Thank you for contacting us!';

// $thankyou_mail_body = file_get_contents('thanks.html');

//*********script********//

$data = $_POST;

$resp = [];
if($to =='' && (!isset($data['email_to']) || $data['email_to'] == '')) {
	$resp['error'] = 'You must provide at least one recipient email address';
	echo $resp['error']; die();
}

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

if(isset($data['email_to']) && $data['email_to'] != '') {
	$to = $data['email_to'];
}

if(isset($data['email_cc']) && $data['email_cc'] != '') {
	$cc = $data['email_cc'];
}

if(isset($data['email_bcc']) && $data['email_bcc'] != '') {
	$bcc = $data['email_bcc'];
}

if(isset($data['subject']) && $data['subject'] != '') {
	$subject = $data['subject'];
}

$body = '';
$body .= 'Form submitted : '.date('Y-m-d H:i:s'); 
foreach ($data as $k => $v) {
	if($k != 'email_to' && $k != 'email_cc' && $k != 'email_bcc' && $k != 'subject' && $k != 'returnurl' && $k != 'submit') {
		$body .= '<br>'.$k.' : '.$v;
	}
}

$thankyou_mail_body = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml"><head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title>Email Template</title>
    <style type="text/css" media="screen">
        /* Linked Styles */
        body { padding:0 !important; margin:0 !important; display:block !important; width:100% !important; background:#faf5f1; -webkit-text-size-adjust:none }
        a { color:#1d1be0; text-decoration:none }

        /* Campaign Monitor wraps the text in editor in paragraphs. In order to preserve design spacing we remove the padding/margin */
        p { padding:0 !important; margin:0 !important } 

        #outlook a { padding: 0; } /* Force Outlook to provide a "view in browser" button. */

         /* Mobile styles */
        @media only screen and (max-device-width: 640px), only screen and (max-width: 640px) { 
            td[class="column"] { float: left !important; display: block !important; width:100% !important;margin:0 auto!important;/*height:auto !important;*/ }
            table[class=devicewidth] {width: 92%!important;text-align:center!important;}       
            td[class="w12"] { width: 12px !important; }
            td[class="w20"] { width: 20px !important; }
            img[class="img-responsive"]{width: 100% !important;height:auto !important;text-align:center !important;display: block;max-width: 100% !important;}
            div[class="img-center"] { text-align: center !important; width: 100% !important; }
            div[class="text-center"],td[class="text-center"] { text-align: center !important; }
                .center {  float: none !important;  margin: 0 auto !important;}
        }
        /* Mobile styles */
        @media only screen and (max-device-width: 480px), only screen and (max-width: 480px) { 

            td[class="column"] { float: left !important; display: block !important; width:100% !important;margin: auto!important;}
            table[class=devicewidth] {width: 92%!important;text-align:center!important;}       
            td[class="w12"] { width: 12px !important; }
            td[class="w20"] { width: 20px !important; }
            img[class="img-responsive"]{width: 100% !important;display: block;max-width: 100% !important;}
            div[class="img-center"] { text-align: center !important; width: 100% !important; }
            div[class="text-center"],td[class="text-center"] { text-align: center !important; }
            td[class="w10"] { width: 10px !important; }
            td[class="w20"] { width: 20px !important; }
            .center {  float: none !important;  margin: 0 auto !important;}
             div[class="f11"] { font-size: 11px !important; line-height: 19px !important; width: auto !important; }
            div[class="f14"] { font-size: 14px !important; line-height: 19px !important; width: auto !important; }
            div[class="f18"] { font-size: 14px !important; line-height: 19px !important; width: auto !important; }
            div[class="f24"] { font-size: 24px !important; line-height: 28px !important; width: auto !important; }
            div[class="hide"] { display: none !important; }
            span[class="f14"] { font-size: 14px !important; line-height: 19px !important; width: auto !important; }
        } 
    </style>
</head>
<body class="body" style="padding:0 !important; margin:0 !important; display:block !important; width:100% !important; background:#ffffff; -webkit-text-size-adjust:none" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" data-new-gr-c-s-check-loaded="14.1012.0" data-gr-ext-installed="">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#fef5f4" align="center">
        <tbody><tr>
            <td align="center" valign="top">
                <table width="616" border="0" cellspacing="0" cellpadding="0" class="devicewidth" bgcolor="#fef5f4">
                    <tbody><tr>
                        <td>

                            <!-- spacer -->
                            <table bgcolor="#fef5f4" border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td>
                                        <div style="display:block; font-size:0pt; line-height:0pt; height:40px"><img alt="" height="40" src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/empty.gif" style="display:block; height:40px" width="1"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- end spacer -->

                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>                                                                        
                                        <td class="column" valign="middle" width="14">
                                            <div style="display:block; font-size:0pt; line-height:0pt; height:14px"><img alt="" height="14" src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/empty.gif" style="display:block; height:14px" width="1"></div>
                                        </td>
                                        <td>
                                            <div class="text-center" style="text-align:center;">
                                                
                                                
                                                <a href="#" style="display: inline-block;" ><img alt="" border="0" height="38" src="http://t-children.webmavens.com/assets/img/logo/logo.png" style="max-width: 145px;" width="145"></a>

                                                
                                            </div>
                                        </td>
                                        <td class="column" valign="middle" width="14">
                                            <div style="display:block; font-size:0pt; line-height:0pt; height:14px"><img alt="" height="14" src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/empty.gif" style="display:block; height:14px" width="1"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- spacer -->
                            <table bgcolor="#fef5f4" border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td>
                                        <div style="display:block; font-size:0pt; line-height:0pt; height:40px"><img alt="" height="40" src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/empty.gif" style="display:block; height:40px" width="1"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- end spacer -->

                            <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
                                <tbody>
                                    <tr>
                                        <td style="font-size:0pt; line-height:0pt; text-align:left" width="40" class="w20"></td> 

                                        <td class="column" align="center" style="text-align: left;color:#000000;">

                                            <div style="display:block;font-size:0pt;line-height:0pt;height: 40px;"><img src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/empty.gif" width="1" height="40" style="display:block;height: 40px;" alt=""></div>

                                            <!-- <div style="color: #666666;font-size:26px;line-height:34px;font-family: Google Sans,Roboto,RobotoDraft,Helvetica,Arial,sans-serif !important;font-weight: bold;text-align: left;">Title comes here!</div> -->

                                            <!-- <div style="display:block; font-size:0pt; line-height:0pt; height:14px"><img src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/empty.gif" width="1" height="14" style="display:block; height:14px" alt=""></div> -->

                                            <div style="color: #777;font-size: 16px;line-height: 26px;font-family: Google Sans,Roboto,RobotoDraft,Helvetica,Arial,sans-serif !important;font-weight:normal;text-align: left;letter-spacing: 0.45px;">

                                                Dear '.$data["first_name"].',

                                                <div style="display:block; font-size:0pt; line-height:0pt; height:14px"><img src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/empty.gif" width="1" height="14" style="display:block; height:14px" alt=""></div>

                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 

                                                <div style="display:block; font-size:0pt; line-height:0pt; height:14px"><img src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/empty.gif" width="1" height="14" style="display:block; height:14px" alt=""></div>

                                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 

                                                <div style="display:block; font-size:0pt; line-height:0pt; height:14px"><img src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/empty.gif" width="1" height="14" style="display:block; height:14px" alt=""></div>

                                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </div>

                                            <div style="display:block;font-size:0pt;line-height:0pt;height: 40px;"><img src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/empty.gif" width="1" height="40" style="display:block;height: 40px;" alt=""></div>

                                            <!-- Button -->
                                            
                                            <!-- End Button -->



                                            
                                        </td>

                                        <td style="font-size:0pt; line-height:0pt; text-align:left" width="40" class="w20"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- spacer -->
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tbody><tr>
                                    <td>
                                        <div style="display:block; font-size:0pt; line-height:0pt; height:14px"><img src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/empty.gif" width="1" height="14" style="display:block; height:14px" alt=""></div>
                                    </td>    
                                </tr>
                            </tbody></table>
                            <!-- end spacer -->

                            <table bgcolor="#fef5f4" border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td>
                                        <div style="display:block; font-size:0pt; line-height:0pt; height:20px"><img alt="" height="20" src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/empty.gif" style="display:block; height:20px" width="1"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table bgcolor="#fef5f4" border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td>
                                        <div style="display:block; font-size:0pt; line-height:0pt; height:10px"><img alt="" height="10" src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/empty.gif" style="display:block; height:10px" width="1"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
                                <tbody><tr>    
                                    <td valign="middle" style="font-size:0pt; line-height:0pt; text-align:left" width="88"></td> <!-- side space -->   

                                    <!-- first box -->
                                    <td class="column" width="110" valign="middle" style="text-align:center; color:#474648;">
                                        <div class="img-center" style="color:#474648; font-family: Google Sans,Roboto,RobotoDraft,Helvetica,Arial,sans-serif !important;mso-line-height-rule:exactly; font-size:12px; line-height:16px; text-align:center; font-weight:normal">
                                            <a href="#" style="color: #8b8a8c;font-family: Google Sans,Roboto,RobotoDraft,Helvetica,Arial,sans-serif !important;mso-line-height-rule:exactly;font-size: 15px;line-height:15px;text-align:center;font-weight: normal;text-transform:  capitalize;">About us</a>
                                        </div>
                                    </td>
                                    <!-- end fist box -->

                                    <!-- for verticle space -->
                                    <td class="column" width="10" valign="middle">
                                        <div style="display:block;font-size:0pt;line-height:0pt;height: 14px;"><img src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/empty.gif" width="1" height="14" style="display:block;height: 14px;background: #f5f5f5;margin:  0 auto;" alt="">
                                        </div>
                                    </td>
                                    <!-- end verticle space -->   

                                    <!-- first box -->
                                    <td class="column" width="60" valign="middle" style="text-align:center; color:#474648;">
                                        <div class="img-center" style="color:#474648; font-family: Google Sans,Roboto,RobotoDraft,Helvetica,Arial,sans-serif !important;mso-line-height-rule:exactly; font-size:12px; line-height:16px; text-align:center; font-weight:normal">
                                            <a href="#" style="color: #8b8a8c;font-family: Google Sans,Roboto,RobotoDraft,Helvetica,Arial,sans-serif !important;mso-line-height-rule:exactly;font-size: 15px;line-height:15px;text-align:center;font-weight: normal;text-transform:  capitalize;">Services</a>
                                        </div>
                                    </td>
                                    <!-- end fist box -->

                                    <!-- for verticle space -->
                                    <td class="column" width="10" valign="middle">
                                        <div style="display:block;font-size:0pt;line-height:0pt;height: 14px;"><img src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/empty.gif" width="1" height="14" style="display:block;height: 14px;background: #f5f5f5;margin:  0 auto;" alt="">
                                        </div>
                                    </td>
                                    <!-- end verticle space -->

                                    <!-- second box -->
                                    <td class="column" width="65" valign="middle" style="text-align:center; color:#474648;">
                                        <div class="img-center" style="color:#474648; font-family: Google Sans,Roboto,RobotoDraft,Helvetica,Arial,sans-serif !important;mso-line-height-rule:exactly; font-size:12px; line-height:16px; text-align:center; font-weight:normal">
                                            <a href="#" style="color: #8b8a8c;font-family: Google Sans,Roboto,RobotoDraft,Helvetica,Arial,sans-serif !important;mso-line-height-rule:exactly;font-size: 15px;line-height:15px;text-align:center;font-weight:normal;">Terms</a>
                                        </div>
                                    </td>
                                    <!-- end second box -->

                                    <!-- for verticle space -->
                                    <td class="column" width="10" valign="middle">
                                        <div style="display:block;font-size:0pt;line-height:0pt;height: 14px;"><img src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/empty.gif" width="1" height="14" style="display:block;height: 14px;background: #f5f5f5;margin:  0 auto;" alt="">
                                        </div>
                                    </td>
                                    <!-- end verticle space -->

                                    <!-- third box -->
                                    <td class="column" width="75" valign="middle" style="text-align:center; color:#474648;">
                                        <div class="img-center" style="color:#474648; font-family: Google Sans,Roboto,RobotoDraft,Helvetica,Arial,sans-serif !important;mso-line-height-rule:exactly; font-size:12px; line-height:16px; text-align:center; font-weight:normal">
                                            <a href="#" style="color: #8b8a8c;font-family: Google Sans,Roboto,RobotoDraft,Helvetica,Arial,sans-serif !important;mso-line-height-rule:exactly;font-size: 15px;line-height:15px;text-align:center;font-weight:normal;">Privacy</a>
                                        </div>
                                    </td>
                                    <!-- end third box -->

                                    <!-- for verticle space -->
                                    <td class="column" width="10" valign="middle">
                                        <div style="display:block;font-size:0pt;line-height:0pt;height: 14px;"><img src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/empty.gif" width="1" height="14" style="display:block;height: 14px;background: #f5f5f5;margin:  0 auto;" alt="">
                                        </div>
                                    </td>
                                    <!-- end verticle space -->

                                    <!-- fourth box -->
                                    <td class="column" width="90" valign="middle" style="text-align:center; color:#474648;">
                                        <div class="img-center" style="color:#474648; font-family: Google Sans,Roboto,RobotoDraft,Helvetica,Arial,sans-serif !important;mso-line-height-rule:exactly; font-size:12px; line-height:16px; text-align:center; font-weight:normal;">
                                            <a href="#" style="color: #8b8a8c;font-family: Google Sans,Roboto,RobotoDraft,Helvetica,Arial,sans-serif !important;mso-line-height-rule:exactly;font-size: 15px;line-height:15px;text-align:center;font-weight:normal;">Contact</a>
                                        </div>
                                    </td>
                                    <!-- end fourth box -->

                                    <td style="font-size:0pt; line-height:0pt; text-align:left" width="88" valign="middle"></td> <!-- side space -->    
                                </tr>   
                            </tbody></table>

                            <table bgcolor="#fef5f4" border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td>
                                        <div style="display:block; font-size:0pt; line-height:0pt; height:20px"><img alt="" height="20" src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/empty.gif" style="display:block; height:20px" width="1"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table bgcolor="#fef5f4" border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td class="w20" style="font-size:0pt; line-height:0pt; text-align:left" width="40">&nbsp;</td>
                                        <td align="left">                                                      

                                            <div style="color: #8b8a8c;font-family: Google Sans,Roboto,RobotoDraft,Helvetica,Arial,sans-serif !important;font-size:16px;mso-line-height-rule:exactly;line-height:27px;text-align: center;font-weight:normal;">
                                                <a href="#" style="color: #8b8a8c;font-family: Google Sans,Roboto,RobotoDraft,Helvetica,Arial,sans-serif !important;font-size: 12px;mso-line-height-rule:exactly;line-height:27px;text-align:left;font-weight:normal; text-decoration: none;">info@example.com</a> &nbsp; - &nbsp;
                                                <a href="#" style="color: #8b8a8c;font-family: Google Sans,Roboto,RobotoDraft,Helvetica,Arial,sans-serif !important;font-size: 12px;mso-line-height-rule:exactly;line-height:27px;text-align:left;font-weight:normal; text-decoration: none;">+91 123 456 7890 (IND)</a> &nbsp; - &nbsp;
                                                <a href="#" style="color: #8b8a8c;font-family: Google Sans,Roboto,RobotoDraft,Helvetica,Arial,sans-serif !important;font-size: 12px;mso-line-height-rule:exactly;line-height:27px;text-align:left;font-weight:normal; text-decoration: none;">+0 (000) 000-0000 (USA)</a>
                                            </div>
                                        </td>
                                        <td class="w20" style="font-size:0pt; line-height:0pt; text-align:left" width="40">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>

                            <table bgcolor="#fef5f4" border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td>
                                        <div style="display:block; font-size:0pt; line-height:0pt; height:40px"><img alt="" height="40" src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/empty.gif" style="display:block; height:40px" width="1"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table bgcolor="#fef5f4" cellpadding="0" cellspacing="0" border="0" align="center">
                                <tbody>
                                    <tr>

                                        <td style="font-size:0pt; line-height:0pt; text-align:center" width="60">
                                            <a href="https://twitter.com" ><img src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/Twitter.png" width="17" style="max-width:17px; opacity: 0.6;" alt="" border="0"></a>
                                        </td>
                                        <td style="font-size:0pt; line-height:0pt; text-align:center" width="60">
                                            <a href="https://www.facebook.com/" ><img src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/Fbk.png" width="9" style="max-width:9px; opacity: 0.6;" alt="" border="0"></a>
                                        </td>
                                        <td style="font-size:0pt; line-height:0pt; text-align:center" width="60">
                                            <a href="https://pinterest.com/" ><img src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/Pinterest.png" width="18" style="max-width:18px; opacity: 0.6;" alt="" border="0"></a>
                                        </td>
                                        <td style="font-size:0pt; line-height:0pt; text-align:center" width="60">
                                            <a href="https://www.instagram.com/" ><img src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/Insta.png" width="18" style="max-width:18px; opacity: 0.6;" alt="" border="0"></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table bgcolor="#fef5f4" border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td>
                                        <div style="display:block; font-size:0pt; line-height:0pt; height:40px"><img alt="" height="40" src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/empty.gif" style="display:block; height:40px" width="1"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table bgcolor="#fef5f4" border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td class="w20" style="font-size:0pt; line-height:0pt; text-align:left" width="30">&nbsp;</td>
                                        <td align="center">

                                            <div style="color:#8b8a8c; font-family: Google Sans,Roboto,RobotoDraft,Helvetica,Arial,sans-serif !important; font-size:12px; mso-line-height-rule:exactly; line-height:20px; text-align:center; font-weight:normal; text-transform: uppercase;">Copyright © 2021. All rights reserved. </div>

                                            <div style="display:block; font-size:0pt; line-height:0pt; height:25px"><img alt="" height="25" src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/empty.gif" style="display:block; height:25px" width="1"></div>

                                        </td>
                                        <td class="w20" style="font-size:0pt; line-height:0pt; text-align:left" width="30">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>

                            <table bgcolor="#fef5f4" border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td>
                                        <div style="display:block; font-size:0pt; line-height:0pt; height:40px"><img alt="" height="40" src="https://d250wtlu7i24bo.cloudfront.net/emailtemplateassets/img/empty.gif" style="display:block; height:40px" width="1"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
    </tbody></table>

</body></html>';

$send_mail = sendemail($to, $body, $subject, $cc, $bcc);

if($send_mail){
	if(isset($data['email']) && $data['email'] != '') {
		sendemail($data['email'], $thankyou_mail_body, $thankyou_mail_subject);	
	}

	if(isset($data['returnurl']) && $data['returnurl'] != '') {
		header('Location:'.$data['returnurl']);
		exit();
	} else {
		echo 'Email has been sent successfully';
		die();
	}
}else{
    echo 'Email has not been sent';
	die();
}

function sendemail($to, $body, $subject='', $cc='', $bcc='') {
	global $username, $password, $port, $host, $from_email, $from_name;

	$mail = new PHPMailer(true);
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPKeepAlive = true;
	$mail->Mailer = "smtp";  

	$mail->Host       = $host;
	$mail->SMTPDebug  = 0; 
	$mail->isHTML(true); 
	$mail->SMTPSecure = "PHPMailer::ENCRYPTION_STARTTLS"; 
	$mail->Port       = 587; 
	$mail->Username   = $username;
	$mail->Password   = $password;
	$mail->setFrom($from_email, $from_name);


	if($to != '') {
		$mail->AddAddress(str_replace(' ', '', $to));
	}

	if($cc != '') {
		$cc_mail = explode(',', $cc);
		for($j=0;$j<count($cc_mail);$j++){
			$mail->AddCC(str_replace(' ', '', trim($cc_mail[$j])));
		}
	}

	if($bcc != '') {
		$bcc_mail = explode(',', $bcc);
		for($j=0;$j<count($bcc_mail);$j++){
			$mail->Addbcc(str_replace(' ', '', trim($bcc_mail[$j])));
		}
	}

	if($subject != '') {
		$mail->Subject = $subject;
	}

	$mail->msgHTML($body); // optional - MsgHTML will create an alternate automatically
	if($mail->Send()) {
		return 1;
	} else {
		return 2;
	}
}

?>