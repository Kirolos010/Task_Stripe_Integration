<!DOCTYPE html>
<html>
<head>
    <title>Payment Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        h1 {
            color: #4caf50;
            margin-bottom: 1rem;
        }

        p {
            font-size: 1.2rem;
            margin: 0.5rem 0;
        }

        .amount {
            font-weight: bold;
            color: #333;
        }

        .button {
            display: inline-block;
            margin-top: 1.5rem;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            color: #fff;
            background-color: #4caf50;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Payment Successful!</h1>
        <p>Thank you for your payment. Your transaction has been processed successfully.</p>
        <p>Payment ID: <strong>{{ $charge->id }}</strong></p>
        <p class="amount">Amount: ${{ number_format($charge->amount / 100, 2) }}</p>
        <a href="/" class="button">Return to Home</a>
    </div>
</body>
</html>
