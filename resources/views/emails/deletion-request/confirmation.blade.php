<x-mail::message>
{{-- Logo Section --}}
<div style="text-align: center; margin-bottom: 30px; padding: 20px 0;">
    <div style="display: inline-block; background: #328072; width: 60px; height: 60px; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
        </svg>
    </div>
    <h1 style="color: #328072; font-size: 24px; font-weight: 700; margin: 0; letter-spacing: -0.5px;">People Db</h1>
    <p style="color: #6b7280; font-size: 14px; margin: 8px 0 0 0;">Your Trusted People Search Platform</p>
</div>

{{-- Header --}}
<h2 style="color: #1f2937; font-size: 20px; font-weight: 600; margin-bottom: 20px;">
    Data Deletion Request Received
</h2>

{{-- Greeting --}}
<p style="color: #374151; font-size: 16px; line-height: 1.6; margin-bottom: 20px;">
    Hello,
</p>

<p style="color: #374151; font-size: 16px; line-height: 1.6; margin-bottom: 25px;">
    We have received your request to delete the profile information for <strong style="color: #328072;">{{ $profile->name }}</strong>. Your request is important to us, and we are committed to protecting your privacy.
</p>

{{-- Request Details Box --}}
<div style="background: #f0fdfa; border-left: 4px solid #328072; padding: 20px; margin-bottom: 25px; border-radius: 0 8px 8px 0;">
    <h3 style="color: #0f766e; font-size: 14px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin: 0 0 12px 0;">Request Details</h3>
    <p style="color: #374151; font-size: 14px; margin: 8px 0;">
        <strong>Profile Name:</strong> {{ $profile->name }}
    </p>
    <p style="color: #374151; font-size: 14px; margin: 8px 0;">
        <strong>Request ID:</strong> #{{ str_pad($deletionRequest->id, 6, '0', STR_PAD_LEFT) }}
    </p>
    <p style="color: #374151; font-size: 14px; margin: 8px 0;">
        <strong>Submitted:</strong> {{ $deletionRequest->created_at->format('F d, Y \a\t g:i A') }}
    </p>
    <p style="color: #374151; font-size: 14px; margin: 8px 0;">
        <strong>Status:</strong> <span style="color: #b45309; font-weight: 500;">Pending Review</span>
    </p>
</div>

{{-- Processing Timeline --}}
<div style="background: #fef3c7; border: 1px solid #fcd34d; padding: 20px; border-radius: 8px; margin-bottom: 25px;">
    <div style="display: flex; align-items: flex-start; gap: 12px;">
        <div style="background: #f59e0b; width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/>
                <polyline points="12,6 12,12 16,14"/>
            </svg>
        </div>
        <div>
            <h3 style="color: #92400e; font-size: 16px; font-weight: 600; margin: 0 0 8px 0;">Processing Time</h3>
            <p style="color: #78350f; font-size: 14px; line-height: 1.6; margin: 0;">
                We will process your request within the next <strong>four (4) business days</strong>. You will receive a confirmation email once the deletion has been completed.
            </p>
        </div>
    </div>
</div>

{{-- What to Expect --}}
<h3 style="color: #1f2937; font-size: 16px; font-weight: 600; margin-bottom: 15px;">What to Expect</h3>
<ul style="color: #374151; font-size: 15px; line-height: 1.8; margin-bottom: 25px; padding-left: 20px;">
    <li>Our team will verify the documents you submitted</li>
    <li>We will review your request for compliance with our policies</li>
    <li>Upon approval, your profile data will be permanently deleted</li>
    <li>You will receive a final confirmation email once completed</li>
</ul>

{{-- Contact Section --}}
<div style="background: #f3f4f6; padding: 20px; border-radius: 8px; margin-bottom: 25px;">
    <h3 style="color: #374151; font-size: 14px; font-weight: 600; margin: 0 0 10px 0;">Questions or Concerns?</h3>
    <p style="color: #6b7280; font-size: 14px; line-height: 1.6; margin: 0;">
        If you have any questions about your request, please contact our support team at <a href="mailto:support@peopledb.com" style="color: #328072; text-decoration: none; font-weight: 500;">support@peopledb.com</a> with your Request ID: <strong>#{{ str_pad($deletionRequest->id, 6, '0', STR_PAD_LEFT) }}</strong>.
    </p>
</div>

{{-- Footer Note --}}
<p style="color: #9ca3af; font-size: 13px; line-height: 1.6; margin-bottom: 25px; font-style: italic;">
    This is an automated message. Please do not reply directly to this email. For assistance, use the contact information provided above.
</p>

{{-- Closing --}}
<p style="color: #374151; font-size: 16px; line-height: 1.6; margin-bottom: 8px;">
    Best regards,
</p>
<p style="color: #328072; font-size: 16px; font-weight: 600; margin: 0;">
    The People Db Team
</p>

{{-- Footer Logo --}}
<div style="text-align: center; margin-top: 40px; padding-top: 30px; border-top: 1px solid #e5e7eb;">
    <p style="color: #9ca3af; font-size: 12px; margin: 0;">
        © {{ date('Y') }} People Db. All rights reserved.
    </p>
</div>
</x-mail::message>
