<!DOCTYPE html>
<html lang="en">
<?php include 'user_register.php'; ?>
<?php include 'user_login.php'; ?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beautiful Auth Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Inter, sans-serif;
        }
        html{
            background: transparent;
        }
        body {
            position: fixed;
    inset: 0;
    background: transparent; /* optional dark */
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;

            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color:white;
        }
        
        .container {
            width: 900px;
            max-width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            align-items: center;
        }
        /* LEFT SIDE (Beautiful art) */
        
        .left {
            padding: 40px;
            background: linear-gradient(135deg, #4c1d95, #0f172a);
            border-radius: 20px;
            backdrop-filter: blur(6px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.5);
            text-align: center;
            animation: fadeIn 1s ease forwards;
        }
        
        .left h1 {
            font-size: 30px;
            margin-bottom: 10px;
            font-weight: 800
        }
        
        .left p {
            opacity: 0.7;
            line-height: 1.5;
            font-size: 15px;
            margin-top: 8px
        }
        /* RIGHT SIDE */
        
        .form-card {
            background: linear-gradient(135deg, #4c1d95, #0f172a);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(6px);
            animation: slideUp 0.9s ease;
            position: relative;
        }
        
        h2 {
            margin-bottom: 10px;
            font-size: 24px
        }
        
        label {
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
            opacity: 0.9
        }
        
        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 10px;
            border: 0;
            background: rgba(255, 255, 255, 0.12);
            color: white;
            font-size: 15px;
        }
        
        button {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border-radius: 10px;
            border: 0;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            color: white;
            background: linear-gradient(135deg, #9333ea, #06b6d4);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4);
        }
        
        .switch {
            margin-top: 10px;
            font-size: 14px;
            text-align: center;
            cursor: pointer;
            opacity: 0.8;
        }
        /* Forgot Modal */
        
        .modal {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: 0.3s;
        }
        
        .modal.open {
            opacity: 1;
            pointer-events: all
        }
        
        .modal-box {
            width: 350px;
            background: #1e1b4b;
            padding: 25px;
            border-radius: 18px;
            animation: fadeIn 0.6s ease;
        }
        /*email css*/
        
        .email-row {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .email-row input {
            flex: 1;
            margin-bottom: 0;
        }
        
        #sendOtpBtn {
            width: auto;
            padding: 12px 14px;
            font-size: 14px;
            font-weight: 600;
            white-space: nowrap;
        }
        /* Animations */
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.93)
            }
            to {
                opacity: 1;
                transform: none
            }
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(25px)
            }
            to {
                opacity: 1;
                transform: none
            }
        }
        @media (max-width: 768px) {
    .left {
        display: none !important;
    }
    .form-card{
        margin:20px;
    }
    .container{
        grid-template-columns: 1fr;
    }
}
    </style>
</head>

<body>

    <div class="container">

        <!-- LEFT / SIMPLE CLEAN DESIGN -->
        <div class="left">
            <h1>Welcome to the patrika</h1>
            <p>Animated Sign In and Sign Up with elegant UI. Smooth transitions and modern glass effect for premium feeling.</p>
        </div>

        <!-- RIGHT / AUTH FORM -->
        <form class="form-card" method="POST" id="formCard">
            <h2 id="title">Sign In</h2>
            <?php if (!empty($message)) { ?>
    <div style="
        margin-bottom:15px;
        padding:12px;
        border-radius:10px;
        font-size:14px;
        background: <?= $messageType === 'success' ? 'rgba(16,185,129,0.2)' : 'rgba(239,68,68,0.2)' ?>;
        color:white;
    ">
        <?= htmlspecialchars($message) ?>
    </div>
<?php } ?>
            <label id="name" for="email"></label>
            <input type="text" class="signup" name="name" placeholder="enter your name" required>

            <label for="email">Email</label>
            <div class="email-row">
                <input type="email" id="email" name="email" placeholder="name@gmail.com" autocomplete="email" required>
                <button type="button" class="signup" id="sendOtpBtn">Send OTP</button>
            </div>

            <label id="otp" for="OTP"></label>
            <input type="text" class="signup" name="otp" pattern="[0-9]{6}" placeholder="Enter OTP">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Your password" minlength="8">

            <label id="leble" for="cpassword"></label>
            <input type="password" class="signup" name="cpassword" placeholder="Confirm Password" required>
            <button id="mainBtn" name="login">Sign In</button>

            <div class="switch" id="forgot">Forgot Password?</div>
            <div class="switch" id="toggle">Don't have account? Sign Up</div>
        </form>
    </div>

    <!-- FORGOT PASSWORD MODAL -->
    <div class="modal" id="modal">
        <div class="modal-box">
            <h3>Reset Password</h3>
            <label>Email</label>
            <input type="email" id="resetEmail" placeholder="you@example.com">
            <button id="sendReset">Send Reset Link</button>
            <div class="switch" id="closeModal" style="margin-top:10px">Close</div>
        </div>
    </div>

    <script>
        const sendOtpBtn = document.getElementById("sendOtpBtn");

        sendOtpBtn.addEventListener("click", () => {
            const emailInput = document.getElementById("email");
            const emailVal = emailInput.value.trim();

            if (!emailVal) {
                alert("Please enter email");
                emailInput.focus();
                return;
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailVal)) {
                alert("Please enter a valid email address");
                emailInput.focus();
                return;
            }

            // Button disable (double click avoid)
            sendOtpBtn.disabled = true;
            sendOtpBtn.innerText = "Sending OTP...";

            fetch("https://script.google.com/macros/s/AKfycbzkVlSXD482R5r5MThXZ4vJFw-_xHTx1zvODfOgrDkD3IFyqpNCasq47ilGb-ExSjmPaA/exec", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "email=" + encodeURIComponent(emailVal)
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === "success") alert("OTP sent successfully!");
                    else alert(data.message);
                })
                .catch(err => alert("Error sending OTP"))
                .finally(() => {
                    sendOtpBtn.disabled = false;
                    sendOtpBtn.innerText = "Send OTP";
                });

        });
        let isSignup = false;
        const name = document.getElementById("name");
        const email = document.getElementById("email");
        const otp = document.getElementById("otp");
        const leble = document.getElementById("leble");
        const title = document.getElementById("title");
        const toggle = document.getElementById("toggle");
        const mainBtn = document.getElementById("mainBtn");
        const formCard = document.getElementById("formCard");
        const cpass = document.getElementsByClassName("signup");
        const pass = document.querySelector('input[name="password"]');
        // Toggle Login/Signup
        for (let i = 0; i < cpass.length; i++) {
            cpass[i].style.display = "none";
            cpass[i].disabled = true;
        }
        toggle.addEventListener("click", () => {
            isSignup = !isSignup;
            if (isSignup) {
                mainBtn.name = "register";
                name.innerText = "Name";
                otp.innerText = "OTP";
                leble.innerText = "confrom password";
                pass.placeholder = "new password";
                for (let i = 0; i < cpass.length; i++) {
                    cpass[i].style.display = "block";
                    cpass[i].disabled = false;
                }
                title.innerText = "User Registration";
                mainBtn.innerText = "Create Account";
                toggle.innerText = "Already have an account? Sign In";
            } else {
                mainBtn.name = "login";
                name.innerText = "";
                otp.innerText = "";
                leble.innerText = "";
                pass.placeholder = "your password";
                for (let i = 0; i < cpass.length; i++) {
                    cpass[i].style.display = "none";
                    cpass[i].disabled = true;
                }
                formCard.action = "user_login.php";
                title.innerText = "Sign In";
                mainBtn.innerText = "Sign In";
                toggle.innerText = "Don't have an account? Sign Up";
            }
        });

        // Forgot password modal
        const modal = document.getElementById("modal");
        const forgot = document.getElementById("forgot");
        const closeModal = document.getElementById("closeModal");

        forgot.addEventListener("click", () => modal.classList.add("open"));
        closeModal.addEventListener("click", () => modal.classList.remove("open"));
        modal.addEventListener("click", e => {
            if (e.target === modal) modal.classList.remove("open");
        });
       

    </script>
</body>

</html>