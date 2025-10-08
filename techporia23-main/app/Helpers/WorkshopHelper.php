<?php

function getCurrentRegistrants()
{
    $db = \Config\Database::connect();

    return $db->table('payment_proofs')
        ->join('transactions', 'payment_proofs.order_id = transactions.order_id')
        ->where('transactions.transaction_status', 'pending_manual')
        ->countAllResults();
}