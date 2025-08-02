<?php

function auto_version($file): string
{
    $mtime = time();
    return sprintf("%s?v=%d", $file, $mtime);
}
