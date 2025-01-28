<?php

namespace App;

enum Permission: string
{
    //
    case ViewAllUsers = 'viewAllUsers';
    case EditUsers = 'editUsers';
    case DeleteUsers = 'deleteUsers';
    case ApproveEmployee = 'approveEmployee';
    case ViewUsersDetails = 'viewUsersDetails';
    case CreateOwnProfile = 'createOwnProfile';
    case EditOwnProfile = 'editOwnProfile';
    case UpdateOwnProfile = 'updateOwnProfile';
    case DeleteOwnProfile = 'deleteOwnProfile';
}
