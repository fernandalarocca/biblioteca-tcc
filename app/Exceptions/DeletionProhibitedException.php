<?php

namespace App\Exceptions;

use Exception;

class DeletionProhibitedException extends Exception
{
    public function render($request)
    {
        return back()->withErrors(['error' => $this->getMessage()]);
    }
}

