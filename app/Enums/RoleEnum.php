<?php

namespace App\Enums;

enum RoleEnum: string
{
    case Student = 'student';
    case HOD = 'hod';
    case Dean = 'dean';
    case Library = 'library';
    case registry = 'registry';
    case hostel = 'hostel';
    case bursary = 'bursary';
    case faculty = 'faculty';
}
