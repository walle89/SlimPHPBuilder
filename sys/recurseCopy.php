<?php
/**
 *
 * @todo Build exclude function
 *
 * @param       $src
 * @param       $dst
 * @param array $exclude
 */
function recurse_copy($src, $dst, $exclude=array())
{
    $dir = opendir($src);
    if (!file_exists($dst) OR !is_dir($dst))
        mkdir($dst);

    while(false !== ($file = readdir($dir)))
    {
        if (($file != '.') && ($file != '..'))
        {
            if (is_dir($src . '/' . $file))
                recurse_copy($src . '/' . $file, $dst . '/' . $file);
            else
                copy($src . '/' . $file, $dst . '/' . $file);
        }
    }
    closedir($dir);
}