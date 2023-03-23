<?php

namespace App\Interfaces;

interface UserInterface {
    static function getWithPagination(string $search);
}
