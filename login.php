<?php require_once "db_session\session_config.php"; require_once "login_handler\login_view.php";  ?>

<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" href="faviconicon.svg">
      <title> My Note  | login </title>
      <style>
          @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }
  body{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #08112c;

  }
  .wrapper{
    position: relative;
    max-width: 430px;
    width: 100%;
    background: #fff;
    padding: 34px;
    border-radius: 6px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.2),
  }
  .wrapper h2{
    position: relative;
    font-size: 22px;
    font-weight: 600;
    color: #333;
  }
  .wrapper h2::before{
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 28px;
    border-radius: 12px;
    background: #4070f4;
  }
  .wrapper form{
    margin-top: 30px;
  }
  .wrapper form .input-box{
    height: 52px;
    margin: 18px 0;
  }
  form .input-box input{
    height: 100%;
    width: 100%;
    outline: none;
    padding: 0 15px;
    font-size: 17px;
    font-weight: 400;
    color: #333;
    border: 1.5px solid #C7BEBE;
    border-bottom-width: 2.5px;
    border-radius: 6px;
    transition: all 0.3s ease;
  }
  .input-box input:focus,
  .input-box input:valid{
    border-color: #4070f4;
  }
  form .policy{
    display: flex;
    align-items: center;
  }
  form h3{
    color: #707070;
    font-size: 14px;
    font-weight: 500;
    margin-left: 10px;
  }
  .input-box.button input{
    color: #fff;
    letter-spacing: 1px;
    border: none;
    background: #4070f4;
    cursor: pointer;
  }
  .input-box.button input:hover{
    background: #152349;
  }
  form .text h3{
  color: #333;
  width: 100%;
  text-align: center;
  }
  form .text h3 a{
    color: #4070f4;
    text-decoration: none;
  }
  form .text h3 a:hover{
    text-decoration: underline;
  }
  .wrapper{
      box-shadow: -5px -10px 40px rgb(55, 162, 64) , 10px 5px 30px rgb(88, 49, 105);
  }
      </style>
  </head>
  <body>
          <div class="wrapper">
          <h2>Login</h2>
          <form action="login_handler\logger.php" method="post">
          <div class="input-box">
              <input name="username" type="text"  placeholder="Enter your name...." >
          </div>
          <div class="input-box">
              <input name="password" type="password" placeholder="password...." >
          </div>
          <div class="input-box button">
              <input type="Submit" value="Login"`>
          </div>
          <div style="font-size: 1em; color: green; text-align: center;display: inline;" >
        <?php require_once 'signup_handler\signup_view.php';  is_signed(); ?>
        <br>  
        </div>
        <br>
        <div style="font-size: 0.9em; color: red; text-align: center;display: inline;" >
        <?php display_errs(); ?>
        </div>
          <div class="text">
              <h3>Don't have an account? <a href="\index.php  ">Sign-up now</a></h3>
          </div>
          </form>
          </div>

  </body>

  </html> 