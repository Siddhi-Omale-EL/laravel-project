<!-- forget-password.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* body {
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        } */

        .otp-container {
            text-align: center;
        }

        .otp-input {
            width: 2em;
            font-size: 1.5em;
            padding: 0.5em;
            margin: 0 0.2em;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .submit-btn {
            margin-top: 1em;
            padding: 0.5em 1em;
            font-size: 1em;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style> <!-- ... (head content) ... -->
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="form-container">
                <center>
                    @if(session('success'))
                    <p style="color: green;">{{ session('success') }}</p>
                    @elseif(session('fail'))
                        <p style="color: red;">{{ session('fail') }}</p>
                    @endif
                    <h2 class="form-title">Forget Password</h2>
                    <form method="post" action="{{ route('otp', ['id' => ':id']) }}" name="forgetPasswordForm" class="forget-password-form">
                        @csrf

                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" />
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
                        </div>
                    </form>
                </center>

            </div>
        </div>
    </div>
    <div class="otp-container">
        <h2>Enter OTP</h2>

        <!-- Display any status message here -->

<br/>
        <form method="POST" action="{{route('otpCheck')}}">
            @csrf

            <!-- Create a loop for each digit of the OTP -->
            @for($i = 1; $i <= 4; $i++)
                <input type="text" class="otp-input" name="otp{{$i}}" maxlength="1" required>
            @endfor

            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
    <!-- ... (scripts) ... -->
</body>
</html>
