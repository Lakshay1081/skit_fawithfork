<?php 
// css function 
function linkCSS($cssPath) {
  $url = BASEURL."/". $cssPath;
  echo '<link rel="stylesheet" type="text/css" href="'.$url.'">';
}

function linkJS($jsPath) {
    $url = BASEURL."/". $jsPath;
    echo '<script type="text/javascript" src="'.$url.'"></script>';
  }

function linkIMG($imgPath , $class, $alt, $width, $height) {
    $url = BASEURL."/". $imgPath;
    echo '<img src="'.$url.'" class="'.$class.'" alt="'.$alt.'" width="'.$width.'" height="'.$height.'">';
}


function confirmation_writer_template($f_name, $l_name, $email, $pass, $message, $date, $url, $logo_url){
    $template= '<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
        <tr>
            <td align="center">
                <img src="'.$logo_url.'" style="display:block; margin:0 auto; width:200px;" alt="Logo">
            </td>
        </tr>
        <tr>
            <td align="center" style="background-color:#1d2539; padding:20px; color:#DAB563;">
                <h2 style="font-size:30px; margin:0;">Welcome to Ankahikhahaniya</h2>
                <p style="font-size:18px; margin:10px 0; width:80%;">'.$message.'</p>
                <a href="'.$url.'" style="padding:15px 20px; background-color:#DAB563; color:#fff; text-decoration:none; text-transform:uppercase; display:inline-block;">Login to Your new account</a>
            </td>
        </tr>
        <tr>
            <td align="center" style="padding:20px;">
                <h5 style="font-size:20px; color:#1d2539; margin:0;">Your New Account</h5>
                <p style="font-size:20px; color:#1d2539; margin:10px 0;">Email id: <a href="mailto:'.$email.'" style="color:#DAB563; text-decoration:underline;">'.$email.'</a></p>
                <p style="font-size:20px; color:#1d2539; margin:10px 0;">Password: <span style="text-decoration:underline; color:#DAB563;">'.$pass.'</span></p>
            </td>
        </tr>
        <tr>
            <td align="center" style="padding:20px;">
                <h5 style="font-size:20px; color:#1d2539; margin:0;">We are here to help</h5>
                <p style="font-size:20px; color:#1d2539; margin:10px 0;">Visit our <a href="http://www.ankahikhahaniya.com" style="color:#DAB563; text-decoration:underline;">Ankahikhahaniya.com</a> or email us at <a href="mailto:info@ankahikhahaniya.com" style="color:#DAB563;">info@ankahikhahaniya.com</a>.</p>
            </td>
        </tr>
    </table>';
    return $template;
}

function confirmation_publish_template($email, $date, $message) {
    $template= '<center class="wrapper">
    <div class="spacer">&nbsp;</div>

    <table class="main center" width="602" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td class="column">
                <div class="column-top">&nbsp;</div>
                <table class="content" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td class="padded">
                                <table style="width:100%">
                                <tr>
                                <tr>
                                    <td><strong>Email Id<strong></td>
                                    <td>'.$email.'</td>
                                </tr>
                                <tr>
                                    <td><strong>Date</strong></td>
                                    <td>'.$date.'</td>
                                </tr>
                                <tr>
                                    <td><strong>Message</strong></td>
                                    <td>'.$message.'</td>
                                </tr>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="column-bottom">&nbsp;</div>
            </td>
        </tr>
        </tbody>
    </table>

    <div class="spacer">&nbsp;</div>
    </center>

    <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,700,400italic,700italic&subset=latin,cyrillic);

    body {
        margin: 0;
        padding: 0;
        mso-line-height-rule: exactly;
        min-width: 100%;
    }

    .wrapper {
        display: table;
        table-layout: fixed;
        width: 100%;
        min-width: 620px;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
    }

    body, .wrapper {
        background-color: #ffffff;
    }

    /* Basic */
    table {
        border-collapse: collapse;
        border-spacing: 0;
    }
    table.center {
        margin: 0 auto;
        width: 602px;
    }
    td {
        padding: 0;
        vertical-align: top;
    }

    .spacer,
    .border {
        font-size: 1px;
        line-height: 1px;
    }
    .spacer {
        width: 100%;
        line-height: 16px
    }
    .border {
        background-color: #e0e0e0;
        width: 1px;
    }

    .padded {
        padding: 0 24px;
    }
    img {
        border: 0;
        -ms-interpolation-mode: bicubic;
    }
    .image {
        font-size: 12px;
    }
    .image img {
        display: block;
    }
    strong, .strong {
        font-weight: 700;
    }
    h1,
    h2,
    h3,
    p,
    ol,
    ul,
    li {
        margin-top: 0;
    }
    ol,
    ul,
    li {
        padding-left: 0;
    }

    a {
        text-decoration: none;
        color: #616161;
    }
    .btn {
        background-color:#2196F3;
        border:1px solid #2196F3;
        border-radius:2px;
        color:#ffffff;
        display:inline-block;
        font-family:Roboto, Helvetica, sans-serif;
        font-size:14px;
        font-weight:400;
        line-height:36px;
        text-align:center;
        text-decoration:none;
        text-transform:uppercase;
        width:200px;
        height: 36px;
        padding: 0 8px;
        margin: 0;
        outline: 0;
        outline-offset: 0;
        -webkit-text-size-adjust:none;
        mso-hide:all;
    }

    /* Top panel */
    .title {
        text-align: left;
    }

    .subject {
        text-align: right;
    }

    .title, .subject {
        width: 300px;
        padding: 8px 0;
        color: #616161;
        font-family: Roboto, Helvetica, sans-serif;
        font-weight: 400;
        font-size: 12px;
        line-height: 14px;
    }

    /* Header */
    .logo {
        padding: 16px 0;
    }

    /* Logo */
    .logo-image {

    }

    /* Main */
    .main {
        -webkit-box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.12), 0 1px 2px 0 rgba(0, 0, 0, 0.24);
        -moz-box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.12), 0 1px 2px 0 rgba(0, 0, 0, 0.24);
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.12), 0 1px 2px 0 rgba(0, 0, 0, 0.24);
    }

    /* Content */
    .columns {
        margin: 0 auto;
        width: 600px;
        background-color: #ffffff;
        font-size: 14px;
    }

    .column {
        text-align: left;
        background-color: #ffffff;
        font-size: 14px;
    }

    .column-top {
        font-size: 24px;
        line-height: 24px;
    }

    .content {
        width: 100%;
    }

    .column-bottom {
        font-size: 8px;
        line-height: 8px;
    }

    .content h1 {
        margin-top: 0;
        margin-bottom: 16px;
        color: #212121;
        font-family: Roboto, Helvetica, sans-serif;
        font-weight: 400;
        font-size: 20px;
        line-height: 28px;
    }

    .content p {
        margin-top: 0;
        margin-bottom: 16px;
        color: #212121;
        font-family: Roboto, Helvetica, sans-serif;
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
    }
    .content .caption {
        color: #616161;
        font-size: 12px;
        line-height: 20px;
    }

    /* Footer */
    .signature, .subscription {
        vertical-align: bottom;
        width: 300px;
        padding-top: 8px;
        margin-bottom: 16px;
    }

    .signature {
        text-align: left;
    }
    .subscription {
        text-align: right;
    }

    .signature p, .subscription p {
        margin-top: 0;
        margin-bottom: 8px;
        color: #616161;
        font-family: Roboto, Helvetica, sans-serif;
        font-weight: 400;
        font-size: 12px;
        line-height: 18px;
    }

    @media only screen and (min-width: 0) {
        .wrapper {
            text-rendering: optimizeLegibility;
        }
    }
    @media only screen and (max-width: 620px) {
        [class=wrapper] {
            min-width: 302px !important;
            width: 100% !important;
        }
        [class=wrapper] .block {
            display: block !important;
        }
        [class=wrapper] .hide {
            display: none !important;
        }

        [class=wrapper] .top-panel,
        [class=wrapper] .header,
        [class=wrapper] .main,
        [class=wrapper] .footer {
            width: 302px !important;
        }

        [class=wrapper] .title,
        [class=wrapper] .subject,
        [class=wrapper] .signature,
        [class=wrapper] .subscription {
            display: block;
            float: left;
            width: 300px !important;
            text-align: center !important;
        }
        [class=wrapper] .signature {
            padding-bottom: 0 !important;
        }
        [class=wrapper] .subscription {
            padding-top: 0 !important;
        }
    }
    </style>';
return $template;
}