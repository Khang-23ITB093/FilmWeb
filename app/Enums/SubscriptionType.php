<?php
    namespace App\Enums;
    enum SubscriptionType: string
    {
        case Free = 'free';
        case Basic = 'basic';
        case Standard = 'standard';
        case Premium = 'premium';
    }
