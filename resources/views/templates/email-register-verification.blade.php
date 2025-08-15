<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Registration - Tonsaeay</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Basic Reset and Body Styles */
        body {
            width: 100%;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            min-height: 100vh;
            color: #333;
        }

        /* Container for the entire card */
        .container {
            display: flex;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            width: 100%;
            box-sizing: border-box; /* Include padding in width */
        }

        /* Header section with logo and button */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 60px; /* Adjust logo size */
            margin-right: 8px;
        }

        .logo-text {
            font-size: 24px;
            font-weight: 700;
            color: #000;
        }

        .logo-subtext {
            font-size: 12px;
            color: #666;
            margin-left: 5px;
            align-self: flex-end; /* Align subtext to the bottom of the logo text */
            font-weight: 400;
        }

        .go-button {
            background-color: transparent;
            border: 1px solid #ddd;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #333;
            cursor: pointer;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .go-button:hover {
            background-color: #f0f0f0;
            border-color: #ccc;
        }

        .main-content {
            width: 500px;
            margin: 0 auto;
        }

        /* Main content area */
        .main-content h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .main-content p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
            color: #555;
        }

        /* Confirmation code box */
        .code-box {
            background-color: #f0f2f5;
            padding: 30px 20px;
            border-radius: 8px;
            text-align: center;
            margin: 30px 0;
        }

        .code {
            font-size: 48px;
            font-weight: 700;
            color: #000;
            letter-spacing: 2px;
        }

        /* Instructions and confirmation button */
        .instructions {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 25px;
            color: #555;
        }

        .or-text {
            font-weight: 600;
            margin-top: 30px;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .confirm-button {
            background-color: #007bff; /* Blue color */
            color: #fff;
            padding: 15px 25px;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.2);
        }

        .confirm-button:hover {
            background-color: #0056b3;
        }

        /* Footer text */
        .footer-text {
            font-size: 14px;
            color: #888;
            margin-top: 30px;
            line-height: 1.5;
        }

        /* Responsive Adjustments */
        @media (max-width: 600px) {
            .container {
                margin: 15px;
                padding: 30px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                margin-bottom: 30px;
            }

            .go-button {
                margin-top: 20px;
                width: 100%;
                text-align: center;
            }

            .main-content h1 {
                font-size: 28px;
            }

            .code {
                font-size: 40px;
            }

            .confirm-button {
                font-size: 16px;
                padding: 12px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        {{-- <div class="header">
            <div class="logo">
                <img src="{{asset('img/tonsaeay.png')}}" alt="Tonsaeay Chat">
                <span class="logo-text">Tonsaeay</span>
            </div>
            <button class="go-button">Go to Tonsaeay Chat</button>
        </div> --}}

        <div class="main-content">
            <h1>Complete registration</h1>
            <p>Please enter this confirmation code in the window where you started creating your account:</p>

            <div class="code-box">
                <span class="code">{{$otp}}</span>
            </div>

            {{-- <p class="instructions">From your mobile device use the code to confirm email.</p>
            <p class="or-text">Or click this button to confirm your email:</p>

            <button class="confirm-button">Confirm your email</button> --}}

            <p class="footer-text">If you didn't create an account in Tonsaeay Chat, please ignore this message.</p>
        </div>
    </div>
</body>
</html>
