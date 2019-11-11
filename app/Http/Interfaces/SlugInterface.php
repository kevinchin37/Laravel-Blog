<?php

namespace App\Http\Interfaces;

interface SlugInterface {
    function isSlugUnique();
    function incrementSlug();
    function getSlug();
}
