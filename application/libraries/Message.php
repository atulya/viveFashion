<?php

class Message {

    // Start Messages
    // User Messages - 1
    // Host Messages - 1000
    // Guest Messages - 2000
    // 0 unknown message
    function alertMessage($msgcode = 0) {
        switch ($msgcode) {
            // User Message
            case 1:
                $msg = 'Email id already exist';
                break;
            case 2:
                $msg = 'Mobile Number is already linked with other account.';
                break;
            case 3:
                $msg = 'Invalid Email id or password.';
                break;
            case 4:
                $msg = 'User has not verified OTP.';
                break;
            case 5:
                $msg = 'Invalid Grant Type.';
                break;
            case 6:
                $msg = 'Missing Grant Type';
                break;
            case 7:
                $msg = 'Seems you haven`t update anything.';
                break;
            case 8:
                $msg = 'Insufficient Data.';
                break;
            case 9:
                $msg = 'Invalid Email Id.';
                break;
            case 10:
                $msg = 'Mobile no must be 10 digits only.';
                break;
            case 11:
                $msg = 'User Already Exists';
                break;
            case 12:
                $msg = 'Internal Server Error.';
                break;
            case 13:
                $msg = 'User is already verified.';
                break;
            case 14:
                $msg = 'Invalid OTP.';
                break;
            case 15:
                $msg = 'Invalid Status.';
                break;
            case 16:
                $msg = 'Insufficient Data.';
                break;
            case 17:
                $msg = 'This mobile no is not registered with us.';
                break;
            case 18:
                $msg = 'Invalid Status.';
                break;
            case 19:
                $msg = 'Access Token Expired.';
                break;
            case 20:
                $msg = 'Invalid Access Token.';
                break;
            case 21:
                $msg = 'Unauthorized.';
                break;
            case 22:
                $msg = 'Invalid Token Type.';
                break;
            case 23:
                $msg = 'Email id is required.';
                break;
            case 24:
                $msg = 'Mobile number is required.';
                break;
            case 26:
                $msg = 'Missing request parameter(s).';
                break;
            case 27:
                $msg = 'Old Password is invalid.';
                break;
            case 28:
                $msg = 'Invalid mobile number.';
                break;
            case 29:
                $msg = 'OTP is expired. Try with new OTP.';
                break;
            case 30:
                $msg = 'Invalid Pincode.';
                break;
            case 33:
                $msg = 'Your account is not verified.';
                break;
            case 34:
                $msg = 'It seems you had nothing edit.';
                break;
            case 36:
                $msg = 'Something wrong happend, Please try again.';
                break;
            case 37:
                $msg = 'Mobile no is already used. Try with another mobile no.';
                break;
            case 38:
                $msg = 'Email ID is linked with another peer account.';
                break;
            case 40:
                $msg = 'Profile is not updated.';
                break;
            case 44:
                $msg = 'This Mobile Number is already registered with us.';
                break;
            case 48:
                $msg = 'Invalid Parent Value.';
                break;
            case 49:
                $msg = 'User Id not exist.';
                break;
            case 50:
                $msg = 'Your Account is inactive, Please contact admin.';
                break;
            case 51:
                $msg = 'Email ID is not registered with us.';
                break;
            case 52:
                $msg = 'Your account is deleted by admin, Please contact admin.';
                break;
            case 65:
                $msg = 'Otp not generated.';
                break;
            case 75:
                $msg = 'Invalid user id.';
                break;
            case 76:
                $msg = 'Username already exists.';
                break;
            case 77:
                $msg = 'Password must be more than 7 characters.';
                break;
            case 78:
                $msg = 'Invalid Credentials.';
                break;
            case 79:
                $msg = 'Your account is deleted by admin, Please contact admin.';
                break;
            case 80:
                $msg = 'Your account is deactived by admin, Please contact admin.';
                break;
            case 91:
                $msg = 'The Business is already found.';
                break;
            case 97:
                $msg = 'Id is invalid.';
                break;
            case 102:
                $msg = 'Referal code is not found in our Database.';
                break;
            case 103:
                $msg = 'Referal code is already used by you.';
                break;
            case 104:
                $msg = 'Invalid version.';
                break;
            case 105:
                $msg = 'Product not found in cart.';
                break;
            case 106:
                $msg = 'Please verify your account.';
                break;
            case 107:
                $msg = 'Transaction ID must be unique.';
                break;
            case 108:
                $msg = 'Transaction ID is not valid.';
                break;
            case 109:
                $msg = 'Can`t redeem same coupon within 24 hours.';
                break;
            case 110:
                $msg = 'Invalid business request.';
                break;
            case 111:
                $msg = 'Coupon is might be expired or used.';
                break;
            default:
                $msg = 'unknown';
                break;
        }
        return $msg;
    }

}

?>