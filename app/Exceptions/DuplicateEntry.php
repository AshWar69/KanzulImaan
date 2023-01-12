<?php

namespace App\Exceptions;

use Exception;
use PDOException;

class DuplicateEntry extends Exception
{
    public function render($request)
    {
        return back()->with(['error' => "Item Already Added To Cart"]);
    }
}
