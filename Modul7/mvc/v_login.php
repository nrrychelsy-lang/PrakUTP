<!DOCTYPE html>
<html>
<head><title>Login Pengurus BEM</title></head>
<body>
    <h2>Login Pengurus BEM FILKOM</h2>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="index.php?act=login">
        NIM: <input type="text" name="nim" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>