<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Register Interest</title>
</head>
<body>
    <h2>New Register Interest Submission</h2>
    <p><strong>Name:</strong> {{ $data['name'] ?? '' }}</p>
    <p><strong>Email:</strong> {{ $data['email'] ?? '' }}</p>
    <p><strong>Phone:</strong> {{ $data['phone'] ?? '' }}</p>
    <p><strong>Project ID:</strong> {{ $data['project_id'] ?? '' }}</p>

    <hr>
    <p>This message was sent from the website registration form.</p>
</body>
</html>
