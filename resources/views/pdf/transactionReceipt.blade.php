    <meta charset="utf-8">
    <title>Transaction Receipt</title>
</head>
<body style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; color: #333; line-height: 1.5; margin: 0; padding: 0; background-color: #ffffff;">

    <!-- Main Container (Fits A5) -->
    <div style="width: 100%; max-width: 100%; margin: 0 auto; background-color: #fff;">
        
        <!-- Brand Header with Navy Background -->
        <div style="background-color: #0a192f; padding: 15px 20px; text-align: center; border-bottom: 4px solid #d4af37;">
            <h1 style="color: #d4af37; margin: 0; font-size: 20px; text-transform: uppercase; letter-spacing: 2px; font-weight: bold;">Transaction Receipt</h1>
            <p style="margin: 5px 0 0; color: #a0aec0; font-size: 10px; letter-spacing: 1px;">OFFICIAL BANK DOCUMENT</p>
        </div>

        <!-- Amount & Status -->
        <div style="text-align: center; padding: 15px 20px; background-color: #f8f9fa;">
            <p style="margin: 0; color: #666; font-size: 11px; text-transform: uppercase; letter-spacing: 1px;">Total Amount</p>
            <div style="font-size: 32px; font-weight: bold; color: #0a192f; margin: 5px 0 10px;">
                ${{ number_format($transaction->amount, 2) }}
            </div>
            
            <!-- Status Badge -->
            <div style="display: inline-block; padding: 4px 12px; background-color: #d4af37; color: #fff; border-radius: 4px; font-size: 10px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;">
                {{ $transaction->status }}
            </div>
            
            <p style="margin-top: 10px; color: #888; font-size: 10px;">Ref: {{ $transaction->reference_id ?? 'N/A' }}</p>
        </div>

        <!-- Details Table -->
        <div style="padding: 10px;">
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="padding: 6px 0; border-bottom: 1px solid #eee; color: #666; width: 40%;">Date & Time</td>
                    <td style="padding: 6px 0; border-bottom: 1px solid #eee; text-align: right; font-weight: bold; color: #0a192f;">
                        {{ $transaction->created_at->format('M d, Y • h:i A') }}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 6px 0; border-bottom: 1px solid #eee; color: #666;">Transaction Type</td>
                    <td style="padding: 6px 0; border-bottom: 1px solid #eee; text-align: right; font-weight: bold; color: #0a192f;">
                        {{ $transaction->transaction_type }}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 6px 0; border-bottom: 1px solid #eee; color: #666; vertical-align: top;">From</td>
                    <td style="padding: 6px 0; border-bottom: 1px solid #eee; text-align: right;">
                        <div style="font-weight: bold; color: #0a192f;">
                            {{ $transaction->sender->first_name ?? 'Unknown' }} {{ $transaction->sender->last_name ?? '' }}
                        </div>
                        <div style="font-size: 10px; color: #888; margin-top: 2px;">
                            {{ substr($transaction->sender->account_number ?? '0000000000', 0, 4) }} **** {{ substr($transaction->sender->account_number ?? '0000000000', -3) }}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 6px 0; border-bottom: 1px solid #eee; color: #666; vertical-align: top;">To</td>
                    <td style="padding: 6px 0; border-bottom: 1px solid #eee; text-align: right;">
                        <div style="font-weight: bold; color: #0a192f;">
                            {{ $transaction->receiver->first_name ?? 'Unknown' }} {{ $transaction->receiver->last_name ?? '' }}
                        </div>
                        <div style="font-size: 10px; color: #888; margin-top: 2px;">
                            {{ substr($transaction->receiver->account_number ?? '0000000000', 0, 4) }} **** {{ substr($transaction->receiver->account_number ?? '0000000000', -3) }}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 6px 0; border-bottom: 1px solid #eee; color: #666;">Beneficiary Bank</td>
                    <td style="padding: 6px 0; border-bottom: 1px solid #eee; text-align: right; font-weight: bold; color: #0a192f;">
                        {{-- {{ $transaction->receiver->bank->name ?? 'N/A' }}  --}}
                         {{ $transaction->bank->name ?? 'N/A' }} 
                    </td>
                </tr>
                <tr>
                    <td style="padding: 6px 0; border-bottom: 1px solid #eee; color: #666;">Description</td>
                    <td style="padding: 6px 0; border-bottom: 1px solid #eee; text-align: right; font-weight: bold; color: #0a192f;">
                        {{ $transaction->description ?? 'Fund Transfer' }}
                    </td>
                </tr>
            </table>

            <!-- Disclaimer / Footer -->
            <div style="margin-top: 15px; padding-top: 10px; border-top: 1px dashed #ccc; font-size: 9px; color: #999; text-align: center; line-height: 1.4;">
                <p style="margin-bottom: 5px; font-weight: bold; color: #0a192f;">Transaction Successful</p>
                <p style="margin-bottom: 5px;">
                    This receipt is computer generated and requires no signature. The completion of this transfer is subject to final verification and fund availability.
                </p>
                <p style="color: #d4af37; font-weight: bold;">
                    Thank you for banking with us.
                </p>
            </div>
        </div>

    </div>
