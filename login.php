<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #475c72ff, #6c63ff);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-container {
      background: #fff;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 6px 18px rgba(0,0,0,0.2);
      width: 350px;
      text-align: center;
    }

    .login-container h2 {
      margin-bottom: 20px;
      color: #333;
      font-size: 24px;
    }

    .form-group {
      margin-bottom: 18px;
      text-align: left;
    }

    label {
      display: block;
      font-size: 14px;
      color: #555;
      margin-bottom: 6px;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 8px;
      outline: none;
      font-size: 14px;
      transition: border-color 0.3s;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
      border-color: #007bff;
    }

    button {
      width: 100%;
      padding: 10px;
      background: #007bff;
      border: none;
      border-radius: 8px;
      color: white;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s;
    }

    button:hover {
      background: #0056b3;
    }

    .login-container p {
      margin-top: 15px;
      font-size: 14px;
      color: #666;
    }

    .login-container a {
      color: #007bff;
      text-decoration: none;
    }

    .login-container a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Login Page</h2>
    <form method="post" action="login_code.php">
      <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" required>
      </div>
      <button name="btn">Login</button>
    </form>
    
  </div>
</body>
</html>
