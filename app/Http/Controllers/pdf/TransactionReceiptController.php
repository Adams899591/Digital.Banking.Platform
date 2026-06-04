<?php

namespace App\Http\Controllers\pdf;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TransactionReceiptController extends Controller
{
 
      // Generate PDF for Transaction Receipt
        public function generateTransactionReceipt(){


                // Fetch the latest transaction with sender, receiver and bank details
                $transaction = Transaction::with(['sender', 'receiver', "bank"])->latest()->first();
                 
                if (!$transaction) {
                    return back()->with('error', 'No transaction found.');
                }

                $data = [
                   "transaction" => $transaction
                ];

                $pdf = Pdf::loadView('pdf.transactionReceipt', $data)->setPaper('A5', 'portrait');;
                return $pdf->download('transaction_receipt.pdf');
        }

 
        // Generate PDF for Transaction Receipt
        public function generateAndSaveTransactionReceipt(){


                // Fetch the latest transaction with sender, receiver and bank details
                $transaction = Transaction::with(['sender', 'receiver', "bank"])->latest()->first();
                 
                if (!$transaction) {
                    return back()->with('error', 'No transaction found.');
                }

                $data = [
                   "transaction" => $transaction
                ];

                $pdf = Pdf::loadView('pdf.transactionReceipt', $data)->setPaper('A5', 'portrait');;
                $pdfDocument = $pdf->download('transaction_receipt.pdf');

                // Save the PDF to storage 
                $filePath = storage_path('app/public/receipts/' . $transaction->id . '.pdf');
                 return   $pdf->save($filePath);
        }
}