<?php 
  session_start(); 
  if (isset($_SESSION['user_email'])) {
        header('Location: ./Assets/Pages/dashboard.php');  // Redirect to login page if not logged in
    exit();
  }

  function displayError($err) {
    if (isset($_SESSION['errors'][$err])) {
      echo "<span style='color: red; font-size: 0.6rem; text-align: justify;'>{$_SESSION['errors'][$err]}</span>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Oraculum | Register/SignIn</title>
    <link rel="stylesheet" href="./Assets/CSS/style.css" />
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
  </head>
  <body>
    <section class="main">
      <div class="cover">
        <div class="cover-card" id="cover-card">
          <div class="front" id="signupCover">
            <div class="intro">
              <h1>
                New here? , <br />
                Join <span>Oraculum</span> Today!
              </h1>
              <p>
                Create an account and start sharing your knowledge with
                Oraculums growing community!
              </p>
            </div>
            <div class="graphics">
              <video
                width="300px"
                loop
                autoplay
                src="Assets/Vid/register.mp4"
              ></video>
            </div>
            <div class="intro">
              <p>
                Already have an account?
                <button class="redirect" id="toLogin" type="button">
                  Login
                </button>
              </p>
            </div>
          </div>
          <div class="back" id="loginCover">
            <div class="intro">
              <h1>Welcome Back!</h1>
              <p>
                Sign in to explore the world of knowledge sharing and get quick
                answers from experts!
              </p>
            </div>
            <div class="graphics">
              <video
                width="300px"
                loop
                autoplay
                src="Assets/Vid/login.mp4"
              ></video>
            </div>
            <div class="intro">
              <p>
                Dont have an account?
                <button class="redirect" id="toSignup" type="button">
                  Sign Up
                </button>
              </p>
            </div>
          </div>
        </div>
      </div>


      <div class="cover">
        <div class="cover-card" id="cover-card">
          <!-- Register Box -->
          <div class="front" id="signupForm">
            <div class="register" id="register">
              <h1>Create Account</h1>
              <form action="./Assets/PHP/signup.php" method="POST">
                <p id="input">
                  <ion-icon name="person-outline"></ion-icon>
                  <input id="name" name="username" type="text" placeholder="Username" value="<?php echo isset($_SESSION['signIn_uname']) ? htmlspecialchars($_SESSION['signIn_uname']) : ''; ?>" />
                </p>
                <?php displayError('username'); ?>
                <p id="input">
                  <ion-icon name="mail-outline"></ion-icon>
                  <input id="email" name="email" type="email" placeholder="Email" value="<?php echo isset($_SESSION['signIn_email']) ? htmlspecialchars($_SESSION['signIn_email']) : ''; ?>" />
                </p>
                <?php displayError('email'); ?>
                <p id="input">
                  <ion-icon id="eyeSignup"  name="eye-outline"></ion-icon>
                  <ion-icon  id="eyeOffSignup" name="eye-off-outline"></ion-icon>
                  <input id="pwdSignup" name="password" type="password" placeholder="Password" />
                </p>
               <?php displayError('password'); ?>
                <input class="submit-btn" type="submit" value="Sign Up" />
              </form>
            </div>
          </div>

          <!-- Login Box -->
          <div class="back" id="loginForm">
            <div class="login" id="login">
              <h1>Sign In</h1>
              <form action="./Assets/PHP/login.php" method="POST">
                <p id="input">
                  <ion-icon name="mail-outline"></ion-icon>
                  <input name="email" type="email" placeholder="Email" />
                </p>
                <p id="input">
                    <ion-icon id="eyeLogin"  name="eye-outline"></ion-icon>
                    <ion-icon  id="eyeOffLogin" name="eye-off-outline"></ion-icon>
                    <input id="pwdLogin" name="password" type="password" placeholder="Password" /><br />
                </p>
                <a id="forgot-pass" href="#">Forgot your password?</a><br />
                <input class="submit-btn" type="submit" value="Sign In" />
              </form>
              <?php $_SESSION['login_error'] = "please enter all the details.";
                echo $_SESSION['login_error'];
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php unset($_SESSION['errors']); // Clear errors after displaying ?>
    <script src="./Assets/Scripts/app.js"></script>
  </body>
</html>
