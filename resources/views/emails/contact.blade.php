<!DOCTYPE html>
<html>

<head>
    <title>New Inquiry from Laptop Doctors Website</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <h2>New Contact Form Submission</h2>

    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Subject:</strong> {{ $data['subject'] }}</p>

    <h3>Message:</h3>
    <div style="background-color: #f4f4f4; padding: 15px; border-radius: 5px;">
        <p>{{ $data['message'] }}</p>
    </div>

    <hr>
    <p style="font-size: 12px; color: #888;">This email was sent from the Laptop Doctors website contact form.</p>
</body>

</html>