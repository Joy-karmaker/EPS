<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donations extends Model
{
    use HasFactory;
    protected $fillable=[
        'programId',
        'event_id',
        'donationDate',
        'account_number',
        'donation_amount',
        'transaction_number',
        'transaction_id',
        'is_approved',
        'approval_date',
        'approved_by',
        'user_id'];
}
