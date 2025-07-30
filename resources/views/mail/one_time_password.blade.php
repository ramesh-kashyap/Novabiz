
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Your OTP from Novabiz</title>
  </head>
  <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 30px;">
    <div style="max-width: 500px; margin: auto; background-color: #ffffff; padding: 20px 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
      <h2 style="color: #333;">Dear User,</h2>
      <p style="font-size: 16px; color: #555;">Greetings!</p>
      <p style="font-size: 16px; color: #555;">
        This is to inform you that a One-Time Password (OTP) has been generated for your authentication.
      </p>
      <p style="font-size: 18px; font-weight: bold; color: #000;">
        OTP: <span style="color: #1e90ff;">{{ $view_message['code'] }} </span>
      </p>
      <p style="font-size: 16px; color: #555;">
        Please use this OTP to proceed with your verification.<br />
        Do not share this code with anyone.
      </p>
      <br />
      <p style="font-size: 16px; color: #555;">Thanks for choosing <strong>Novabiz</strong>.</p>
      <p style="font-size: 16px; color: #888;">– Novabiz Team</p>
    </div>
  </body>
</html>
