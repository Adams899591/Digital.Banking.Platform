<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply to your Support Ticket - Prestige International Bank</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
</head>
<body style="background-color: #f3f4f6; font-family: 'Inter', sans-serif; color: #1e293b; -webkit-font-smoothing: antialiased; padding-top: 2.5rem; padding-bottom: 2.5rem; margin: 0;">
    
    <!-- Email Container -->
    <div style="max-width: 42rem; margin-left: auto; margin-right: auto; background-color: #ffffff; border-radius: 0.5rem; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); overflow: hidden; border: 1px solid #e5e7eb;">
        
        <!-- Header / Logo Area -->
        <div style="background-color: #0a192f; padding: 2rem; text-align: center;">
            <div style="font-family: 'Playfair Display', serif; font-size: 1.875rem; font-size: clamp(1.5rem, 5vw, 1.875rem); line-height: 2.25rem; font-weight: 700; letter-spacing: 0.025em; color: #ffffff;">
                Prestige<span style="color: #c5a059;">.</span>
            </div>
            <p style="color: #8892b0; font-size: 0.75rem; line-height: 1rem; margin-top: 0.5rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0;">International Banking</p>
        </div>

        <!-- Main Content -->
        <div style="padding: 2rem;">
            <h1 style="font-size: 1.5rem; font-size: clamp(1.25rem, 5vw, 1.5rem); line-height: 2rem; font-weight: 700; color: #0a192f; margin-bottom: 1.5rem; font-family: 'Playfair Display', serif; margin-top: 0;">We've Responded to Your Ticket</h1>
            
            <p style="color: #4b5563; margin-bottom: 1.5rem; line-height: 1.625; font-size: 1rem; font-size: clamp(0.875rem, 4vw, 1rem); margin-top: 0;">
                Hello {{ $user->user->first_name }} {{ $user->user->last_name }},
            </p>
            
            <p style="color: #4b5563; margin-bottom: 2rem; line-height: 1.625; font-size: 1rem; font-size: clamp(0.875rem, 4vw, 1rem); margin-top: 0;">
                We have an update regarding your support ticket with the subject: <strong>"{{ $user->subject }}"</strong>.
            </p>

            <!-- Admin Reply -->
            <div style="background-color: #f9fafb; border: 1px solid #e5e7eb; border-radius: 0.5rem; padding: 1.5rem; margin-bottom: 2rem;">
                <p style="color: #4b5563; margin-top: 0; margin-bottom: 1rem; font-size: 0.875rem; font-weight: 600;">Reply from {{ $user->replied_by }}:</p>
                <p style="color: #1e293b; line-height: 1.625; font-size: 1rem; margin: 0;">
                    {{ $user->admin_reply }}
                </p>
            </div>

            <p style="color: #4b5563; line-height: 1.625; font-size: 0.875rem; font-size: clamp(0.75rem, 3vw, 0.875rem); margin-top: 2rem; margin-bottom: 0;">
                Regards,<br>
                <span style="font-weight: 700; color: #0a192f; font-family: 'Playfair Display', serif; font-size: 1.125rem; font-size: clamp(1rem, 4vw, 1.125rem); line-height: 1.75rem;">Prestige International Bank Team</span>
            </p>
            
            <!-- Divider -->
            <div style="border-top: 1px solid #f3f4f6; margin-top: 2rem; margin-bottom: 2rem;"></div>
            
            <!-- Fallback Link -->
            <p style="font-size: 0.75rem; line-height: 1rem; color: #9ca3af; text-align: center; line-height: 1.625; margin-top: 0; margin-bottom: 0;">
                Please do not reply to this email. This is an automated notification and responses are not monitored. If you have further questions, please open a new support ticket through your online banking portal.
            </p>
        </div>

        <!-- Footer -->
        <div style="background-color: #f9fafb; padding: 1.5rem 2rem; text-align: center; border-top: 1px solid #e5e7eb;">
            <div style="margin-bottom: 1rem; display: flex; justify-content: center;">
                <a href="#" style="color: #9ca3af; text-decoration: none; margin: 0 0.75rem;"><i class="fa-brands fa-facebook" style="font-size: 1.25rem;"></i></a>
                <a href="#" style="color: #9ca3af; text-decoration: none; margin: 0 0.75rem;"><i class="fa-brands fa-twitter" style="font-size: 1.25rem;"></i></a>
                <a href="#" style="color: #9ca3af; text-decoration: none; margin: 0 0.75rem;"><i class="fa-brands fa-linkedin" style="font-size: 1.25rem;"></i></a>
                <a href="#" style="color: #9ca3af; text-decoration: none; margin: 0 0.75rem;"><i class="fa-brands fa-instagram" style="font-size: 1.25rem;"></i></a>
            </div>
            <p style="font-size: 0.75rem; line-height: 1rem; color: #6b7280; margin-bottom: 0.5rem; margin-top: 0;">
                &copy; {{ date('Y') }} Prestige International Bank. All rights reserved.
            </p>
            <p style="font-size: 0.75rem; line-height: 1rem; color: #9ca3af; margin-top: 0; margin-bottom: 0;">
                123 Banking District, Financial City, FC 10001
            </p>
        </div>
    </div>

</body>
</html>