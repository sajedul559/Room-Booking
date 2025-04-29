<!DOCTYPE html>
<html>
<head>
    <title>Rent Reminder</title>
</head>
<body>
    <h2>Hello {{ $user->name }},</h2>

    <p>This is a reminder that your rent of <strong>${{ number_format($rentDetails['amount'], 2) }}</strong> is due today ({{ \Carbon\Carbon::parse($rentDetails['due_date'])->format('F j, Y') }}).</p>

    <p>Please make the payment at your earliest convenience to avoid late fees.</p>

    <p>Thank you,<br>The Admin Team</p>
</body>
</html>
