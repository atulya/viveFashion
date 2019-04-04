<?php

function sendEmail($email, $type, $data) {
    $CI = & get_instance();
    $content = content($type, $data);
    echo '<pre>';
    print_r($content);die();
    $CI->load->library('email');
    $CI->email->set_mailtype("html");
    $CI->load->library('email');
    $CI->email->from('example@gmail.com', PROJECT_NAME . ' Team');
    $CI->email->to($email);
    $CI->email->subject($content['subject']);
    $theme = '';
    $theme .= '<table border="0" cellpadding="40" cellspacing="0" width="100%">';
    $theme .= '<tbody>';
    $theme .= '<tr>';
    $theme .= '<td bgcolor="#EEEEEE">';
    $theme .= '<div align="center">';
    $theme .= '<table border="0" cellpadding="0" cellspacing="0" width="600">';
    $theme .= '<tbody>';
    $theme .= '<tr>';
    $theme .= '<td height="62" style="border-radius:3px 3px 0px 0px;background:#3ed6a2;padding-left:50px"><p style="color:white;font-size:22px;"><strong>' . PROJECT_NAME . '</strong></p></td>';
    $theme .= '</tr>';
    $theme .= '<tr>';
    $theme .= '<td>';
    $theme .= '<table border="0" cellpadding="0px" cellspacing="0px" width="600">';
    $theme .= '<tbody>';
    $theme .= '<tr>';
    $theme .= '<td bgcolor="#FFFFFF" style="border-radius:0px 0px 3px 3px;color:#777777;font-family:Helvetica,Arial,sans-serif;font-size:16px;line-height:25px;padding:30px 50px 35px 50px"><span style="color:#222222;font-family:Helvetica,Arial,sans-serif;font-size:32px">' . $subject . '</span><br><br>';
    $theme .= $content['message'];
    $theme .= '<br><br>Thanks,';
    $theme .= '<br>' . PROJECT_NAME . ' Team</td>';
    $theme .= '</tr>';
    $theme .= '</tbody>';
    $theme .= '</table>';
    $theme .= '</td>';
    $theme .= '</tr>';
    $theme .= '<tr>';
    $theme .= '<td height="62" style="border-radius:3px 3px 0px 0px;background:#3ed6a2;padding-left:50px">&nbsp;</td>';
    $theme .= '</tr>';
    $theme .= '<tr>';
    $theme .= '<td style="color:#888888;font-family:Helvetica,Arial,sans-serif;font-size:12px;line-height:15px;padding:0px 15px 0px 15px"><br>';
    $theme .= '<br>This message was mailed to <a style="color:#888888;text-decoration:none">' . $email . '</a></td>';
    $theme .= '</tr>';
    $theme .= '</tbody>';
    $theme .= '</table>';
    $theme .= '</div>';
    $theme .= '</td>';
    $theme .= '</tr>';
    $theme .= '</tbody>';
    $theme .= '</table>';
    $CI->email->message($theme);
    $CI->email->send();
}

function content($type, $data) {
    $params = array('message' => '', 'subject' => '');
    switch ($type) {
        case 1: // Inquiry to Admin
            $params['subject'] = 'New Inquiry';
            $table = '<table>';
            $table .= '<tr><td>Name: </td><td>' . $data['name'] . '</td></tr>';
            $table .= '<tr><td>Email: </td><td>' . $data['email'] . '</td></tr>';
            $table .= '<tr><td>Mobile: </td><td>' . $data['mobile'] . '</td></tr>';
            $table .= '<tr><td>Product Name: </td><td>' . $data['product_name'] . '</td></tr>';
            $table .= '</table>';
            $params['message'] = '<p>We found new inquiry for <strong>' . $data['product_name'] . '</strong>.</p>';
            $params['message'] .= '<p>Below details of user.</p>';
            $params['message'] .= $table;
            break;
        case 2: // Inquiry to Customer
            $params['subject'] = 'We got your Inquiry.';
            $params['message'] = '<p>Thank you so much for your time. We got your inquiry about ' . $data['product_name'] . ', our representative will contact you within 24 Hours.</p>';
            break;
        default:
            break;
    }
    return $params;
}
