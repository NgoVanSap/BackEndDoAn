<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 100px;
        }

        input {
            margin: 10px;
            padding: 5px;
            width: 300px;
            border: none;
            border-radius: 5px;
            box-shadow: 0px 0px 5px #ccc;
        }

        button {
            padding: 10px;
            width: 100px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <form>
        <input type="email" id="email" placeholder="Email">
        <input type="password" id="password" placeholder="Password">
        <button type="submit">Login</button>
    </form>
</body>

<script>
    const form = document.querySelector('form');
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const response = await fetch(
            'https://7d47-2405-4802-609b-cf40-99e2-92ef-3191-7dcd.ngrok-free.app/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    email: email,
                    password: password
                })
            });
        const data = await response.json();
        // Xử lý kết quả đăng nhập ở đây
    });
</script>

</html>
