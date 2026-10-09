<?php

namespace App\Enums;

enum ContactType: string
{
    case Developer = 'developer';
    case ProjectManager = 'project_manager';
    case ProductOwner = 'product_owner';
    case Other = 'other';
}
