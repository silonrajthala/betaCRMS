<!DOCTYPE html>
<html>
<head>
    <title>{{ $data['subject'] }}</title>
</head>
<body>
    <p>Dear {{ $data['name'] }}</p>
    <p>Your User have been created successfully in CRMS. You can now login into CRMS with your username and password mentioned below: </p>
    
    <p style="color: red;">Kindly request you change the password after login</p>

     <p>Email:<strong>{{ $data['email'] }}</strong></p>
     <p>Password:<strong>{{ $data['password'] }}</strong></p>
    
    <p><strong>You do not need to reply this email. Please keep your information confidential. You will be solely responsible to handle your information.</strong></p>
    <p>Regards,<br>
        Admin,<br>
        CRMS</p>
</body>
</html>
