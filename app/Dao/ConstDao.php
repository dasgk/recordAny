<?php

namespace App\Dao;

use App\Models\AppUsers;
use App\Models\Article;

class ConstDao extends AppUsers
{
    const TYPE_COLLECT = 1;
    const PER_PAGE_SIZE = 15;
}