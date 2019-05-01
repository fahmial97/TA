<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Verify_model extends CI_Model
{

    function verif($dataVerif)
    {
        return '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html>
        
        <head>
            <meta charset="UTF-8">
            <meta content="width=device-width, initial-scale=1" name="viewport">
            <meta content="telephone=no" name="format-detection">
            <title></title>
            <!--[if (mso 16)]>
            <style type="text/css">
            a {text-decoration: none;}
            </style>
            <![endif]-->
            <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
        </head>
        
        <body>
            <div class="es-wrapper-color">
                <!--[if gte mso 9]>
                    <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
                        <v:fill type="tile" color="#cccccc"></v:fill>
                    </v:background>
                <![endif]-->
                <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td class="esd-email-paddings" valign="top">
                                <table class="es-header esd-header-popover" cellspacing="0" cellpadding="0" align="center">
                                    <tbody>
                                        <tr>
                                            <td class="es-adaptive esd-stripe" align="center">
                                                <table class="es-header-body" width="600" cellspacing="0" cellpadding="0" align="center">
                                                    <tbody>
                                                        <tr>
                                                            <td class="esd-structure es-p20t es-p20b es-p40r es-p40l" esd-general-paddings-checked="true" align="left">
                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="esd-container-frame" width="520" valign="top" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="esd-block-image es-m-p0l" align="center">
                                                                                                <a href="" target="_blank"><img src="https://i.postimg.cc/nLx7dhHx/default.png" alt="Sistem Login" width="118" title="Sistem Login" style="display: block;"></a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                                    <tbody>
                                        <tr>
                                            <td class="esd-stripe" esd-custom-block-id="3109" align="center">
                                                <table class="es-content-body" style="background-color: rgb(255, 255, 255);" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                                    <tbody>
                                                        <tr>
                                                            <td class="esd-structure es-p20t es-p20b es-p40r es-p40l" esd-general-paddings-checked="true" align="left">
                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="esd-container-frame" width="520" valign="top" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="esd-block-text" align="left">
                                                                                                <h1 style="color: #4a7eb0;">Please verify your account!</h1>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="esd-block-spacer es-p5t es-p20b" align="left">
                                                                                                <table width="5%" height="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td style="border-bottom: 2px solid rgb(153, 153, 153); background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; height: 1px; width: 100%; margin: 0px;"></td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="esd-block-text es-p10b" align="left">
                                                                                                <p><span style="font-size: 16px; line-height: 150%;">Hi, ' . $dataVerif['nama'] . '</span></p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="esd-block-text" align="left">
                                                                                                <p>Selamat datang di website sistem login lengkap, silahkan verifikasi akun anda.</p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="esd-block-button es-p20t es-p20b" align="left"> <span class="es-button-border"> <a href="' . base_url() . 'auth/verify?email=' . $dataVerif['email'] . '&token=' . urlencode($dataVerif['token']) . '" target="_blank" style="border-width: 10px 25px;">Verify account</a> </span> </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="esd-block-text" align="left">
                                                                                                <p><br></p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="esd-structure es-p20t es-p20b es-p40r es-p40l" esd-general-paddings-checked="true" align="left">
                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="esd-container-frame" width="520" valign="top" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="esd-block-spacer es-p20t es-p20b es-p5r" align="center">
                                                                                                <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td style="border-bottom: 1px solid rgb(255, 255, 255); background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; height: 1px; width: 100%; margin: 0px;"></td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                                    <tbody>
                                        <tr> </tr>
                                        <tr>
                                            <td class="esd-stripe" esd-custom-block-id="3104" align="center">
                                                <table class="es-footer-body" style="background-color: rgb(239, 239, 239);" width="600" cellspacing="0" cellpadding="0" bgcolor="#efefef" align="center">
                                                    <tbody>
                                                        <tr>
                                                            <td class="esd-structure es-p20" align="left">
                                                                <!--[if mso]><table width="560" cellpadding="0" cellspacing="0"><tr><td width="194"><![endif]-->
                                                                <table class="es-left" cellspacing="0" cellpadding="0" align="left">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="es-m-p0r es-m-p20b esd-container-frame" width="174" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="esd-block-image es-m-p0l es-p10b" align="left">
                                                                                                <a href="" target="_blank"><img src="https://my.stripo.email/content/guids/c02741fc-5c4b-48ea-ae03-a66a472ed6f7/images/74701554372602247.jpg" alt="" width="103" style="display: block;"></a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                            <td class="es-hidden" width="20"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <!--[if mso]></td><td width="173"><![endif]-->
                                                                <table class="es-left" cellspacing="0" cellpadding="0" align="left">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="es-m-p0r es-m-p20b esd-container-frame" width="173" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="esd-block-social" align="left">
                                                                                                <table class="es-table-not-adapt es-social" cellspacing="0" cellpadding="0">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td class="es-p10r" valign="top" align="center">
                                                                                                                <a href=""><img title="Twitter" src="https://stripo.email/cabinet/assets/editor/assets/img/social-icons/circle-colored/twitter-circle-colored.png" alt="Tw" width="24" height="24"></a>
                                                                                                            </td>
                                                                                                            <td class="es-p10r" valign="top" align="center">
                                                                                                                <a href=""><img title="Facebook" src="https://stripo.email/cabinet/assets/editor/assets/img/social-icons/circle-colored/facebook-circle-colored.png" alt="Fb" width="24" height="24"></a>
                                                                                                            </td>
                                                                                                            <td class="es-p10r" valign="top" align="center">
                                                                                                                <a href=""><img title="Youtube" src="https://stripo.email/cabinet/assets/editor/assets/img/social-icons/circle-colored/youtube-circle-colored.png" alt="Yt" width="24" height="24"></a>
                                                                                                            </td>
                                                                                                            <td valign="top" align="center">
                                                                                                                <a href=""><img title="Vkontakte" src="https://stripo.email/cabinet/assets/editor/assets/img/social-icons/circle-colored/vk-circle-colored.png" alt="Vk" width="24" height="24"></a>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <!--[if mso]></td><td width="20"></td><td width="173"><![endif]-->
                                                                <table class="es-right" cellspacing="0" cellpadding="0" align="right">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="es-m-p0r es-m-p20b esd-container-frame" width="173" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td align="center" class="esd-empty-container" style="display: none;"></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <!--[if mso]></td></tr></table><![endif]-->
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="esd-structure es-p15b es-p20r es-p20l" esd-general-paddings-checked="false" align="left">
                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="esd-container-frame" width="560" valign="top" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="esd-block-text" esdev-links-color="#333333" align="left">
                                                                                                <p style="font-size: 12px; line-height: 150%;">You are receiving this email because you have visited our site or asked us about regular newsletter.</p>
                                                                                                <p style="font-size: 12px; line-height: 150%;"><a target="_blank" href="https://viewstripo.email/" style="font-size: 12px;">Unsubscribe</a>&nbsp; | <a target="_blank" href="https://viewstripo.email/" style="font-size: 12px;">Update Preferences</a> | <a target="_blank" href="https://viewstripo.email/" style="font-size: 12px;">Customer Support</a></p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                               
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </body>
        
        </html>';
    }

    function forgot($dataVerif)
    {
        return '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html>
        
        <head>
            <meta charset="UTF-8">
            <meta content="width=device-width, initial-scale=1" name="viewport">
            <meta content="telephone=no" name="format-detection">
            <title></title>
            <!--[if (mso 16)]>
            <style type="text/css">
            a {text-decoration: none;}
            </style>
            <![endif]-->
            <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
        </head>
        
        <body>
            <div class="es-wrapper-color">
                <!--[if gte mso 9]>
                    <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
                        <v:fill type="tile" color="#cccccc"></v:fill>
                    </v:background>
                <![endif]-->
                <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td class="esd-email-paddings" valign="top">
                                <table class="es-header esd-header-popover" cellspacing="0" cellpadding="0" align="center">
                                    <tbody>
                                        <tr>
                                            <td class="es-adaptive esd-stripe" align="center">
                                                <table class="es-header-body" width="600" cellspacing="0" cellpadding="0" align="center">
                                                    <tbody>
                                                        <tr>
                                                            <td class="esd-structure es-p20t es-p20b es-p40r es-p40l" esd-general-paddings-checked="true" align="left">
                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="esd-container-frame" width="520" valign="top" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="esd-block-image es-m-p0l" align="center">
                                                                                                <a href="" target="_blank"><img src="https://i.postimg.cc/nLx7dhHx/default.png" alt="Sistem Login" width="118" title="Sistem Login" style="display: block;"></a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                                    <tbody>
                                        <tr>
                                            <td class="esd-stripe" esd-custom-block-id="3109" align="center">
                                                <table class="es-content-body" style="background-color: rgb(255, 255, 255);" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                                    <tbody>
                                                        <tr>
                                                            <td class="esd-structure es-p20t es-p20b es-p40r es-p40l" esd-general-paddings-checked="true" align="left">
                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="esd-container-frame" width="520" valign="top" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="esd-block-text" align="left">
                                                                                                <h1 style="color: #4a7eb0;">Please verify your account!</h1>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="esd-block-spacer es-p5t es-p20b" align="left">
                                                                                                <table width="5%" height="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td style="border-bottom: 2px solid rgb(153, 153, 153); background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; height: 1px; width: 100%; margin: 0px;"></td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="esd-block-text es-p10b" align="left">
                                                                                                <p><span style="font-size: 16px; line-height: 150%;">Hi, ' . $dataVerif['nama'] . '</span></p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="esd-block-text" align="left">
                                                                                                <p>Silahkan tekan tombol dibawah ini, untuk melakukan reset password.</p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="esd-block-button es-p20t es-p20b" align="left"> <span class="es-button-border"> <a href="' . base_url() . 'auth/resetpassword?email=' . $dataVerif['email'] . '&token=' . urlencode($dataVerif['token']) . '" target="_blank" style="border-width: 10px 25px;">Reset Password</a> </span> </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="esd-block-text" align="left">
                                                                                                <p><br></p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="esd-structure es-p20t es-p20b es-p40r es-p40l" esd-general-paddings-checked="true" align="left">
                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="esd-container-frame" width="520" valign="top" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="esd-block-spacer es-p20t es-p20b es-p5r" align="center">
                                                                                                <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td style="border-bottom: 1px solid rgb(255, 255, 255); background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; height: 1px; width: 100%; margin: 0px;"></td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                                    <tbody>
                                        <tr> </tr>
                                        <tr>
                                            <td class="esd-stripe" esd-custom-block-id="3104" align="center">
                                                <table class="es-footer-body" style="background-color: rgb(239, 239, 239);" width="600" cellspacing="0" cellpadding="0" bgcolor="#efefef" align="center">
                                                    <tbody>
                                                        <tr>
                                                            <td class="esd-structure es-p20" align="left">
                                                                <!--[if mso]><table width="560" cellpadding="0" cellspacing="0"><tr><td width="194"><![endif]-->
                                                                <table class="es-left" cellspacing="0" cellpadding="0" align="left">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="es-m-p0r es-m-p20b esd-container-frame" width="174" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="esd-block-image es-m-p0l es-p10b" align="left">
                                                                                                <a href="" target="_blank"><img src="https://my.stripo.email/content/guids/c02741fc-5c4b-48ea-ae03-a66a472ed6f7/images/74701554372602247.jpg" alt="" width="103" style="display: block;"></a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                            <td class="es-hidden" width="20"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <!--[if mso]></td><td width="173"><![endif]-->
                                                                <table class="es-left" cellspacing="0" cellpadding="0" align="left">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="es-m-p0r es-m-p20b esd-container-frame" width="173" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="esd-block-social" align="left">
                                                                                                <table class="es-table-not-adapt es-social" cellspacing="0" cellpadding="0">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td class="es-p10r" valign="top" align="center">
                                                                                                                <a href=""><img title="Twitter" src="https://stripo.email/cabinet/assets/editor/assets/img/social-icons/circle-colored/twitter-circle-colored.png" alt="Tw" width="24" height="24"></a>
                                                                                                            </td>
                                                                                                            <td class="es-p10r" valign="top" align="center">
                                                                                                                <a href=""><img title="Facebook" src="https://stripo.email/cabinet/assets/editor/assets/img/social-icons/circle-colored/facebook-circle-colored.png" alt="Fb" width="24" height="24"></a>
                                                                                                            </td>
                                                                                                            <td class="es-p10r" valign="top" align="center">
                                                                                                                <a href=""><img title="Youtube" src="https://stripo.email/cabinet/assets/editor/assets/img/social-icons/circle-colored/youtube-circle-colored.png" alt="Yt" width="24" height="24"></a>
                                                                                                            </td>
                                                                                                            <td valign="top" align="center">
                                                                                                                <a href=""><img title="Vkontakte" src="https://stripo.email/cabinet/assets/editor/assets/img/social-icons/circle-colored/vk-circle-colored.png" alt="Vk" width="24" height="24"></a>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <!--[if mso]></td><td width="20"></td><td width="173"><![endif]-->
                                                                <table class="es-right" cellspacing="0" cellpadding="0" align="right">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="es-m-p0r es-m-p20b esd-container-frame" width="173" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td align="center" class="esd-empty-container" style="display: none;"></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <!--[if mso]></td></tr></table><![endif]-->
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="esd-structure es-p15b es-p20r es-p20l" esd-general-paddings-checked="false" align="left">
                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="esd-container-frame" width="560" valign="top" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="esd-block-text" esdev-links-color="#333333" align="left">
                                                                                                <p style="font-size: 12px; line-height: 150%;">You are receiving this email because you have visited our site or asked us about regular newsletter.</p>
                                                                                                <p style="font-size: 12px; line-height: 150%;"><a target="_blank" href="https://viewstripo.email/" style="font-size: 12px;">Unsubscribe</a>&nbsp; | <a target="_blank" href="https://viewstripo.email/" style="font-size: 12px;">Update Preferences</a> | <a target="_blank" href="https://viewstripo.email/" style="font-size: 12px;">Customer Support</a></p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                               
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </body>
        
        </html>';
    }
}

/* End of file Verify_model.php */
