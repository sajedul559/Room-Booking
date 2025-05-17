<?php

namespace App\Enums\Models;

enum TenantAcceptingOptions: string 
{
    case Backpackers = 'Backpackers';
    case Students = 'Students';
    case Smokers = 'Smokers';
    case LGBTQIA = 'LGBTQIA+';
    case Seniors = '40+ years olds';
    case Children = 'Children';
    case Pets = 'Pets';
    case Retirees = 'Retirees';
    case OnWelfare = 'On welfare';
}
