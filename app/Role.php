<?php

namespace App;

enum Role: string
{
    //
    case Admin = 'admin';
    case Employee = 'employee';
    case Employer = 'employer';
    case GovtStaff = 'govt_staff';
}
