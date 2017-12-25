<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Base extends Model
{
    public function SelectQuery($sql)
    {
        return DB::select($sql);
    }
    
    public function sqlStatement($sqlStmnt)
    {
        return DB::statement($sqlStmnt);
    }
}
