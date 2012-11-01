<?php
/**
 * User: Eric Wallmander
 * Date: 2012-10-02
 * Time: 13:51
 */
require_once 'sys/start.php';
require_once 'sys/recurseCopy.php';

$b = $c['build'];

define('CHANGELOG_FILE', $b['buildPath'].$b['changelog']);

if(!file_exists($b['buildPath']) OR !is_dir($b['buildPath']))
    mkdir($b['buildPath'], 0755);

if(count($_POST))
{
    if(empty($_POST['changelog']))
    {
        echo 'You must ha a changelog!';
        exit;
    }

    foreach($b['pages'] as $page => $pageName)
    {
        if($b['buildMethod'] == 'curl')
        {
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL, $b['baseURL'].'/?p='.$page);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch,CURLOPT_CONNECTTIMEOUT, 2);
            $data = curl_exec($ch);
            curl_close($ch);
        }
        elseif($b['buildMethod'] == 'command')
        {
            passthru('php index.php -p '. $page, $data);
        }
        else
        {
            echo 'Wrong build method!';
            exit;
        }

        preg_match_all('#./?p=([a-z0-9_-]+)#iu', $data, $m);

        foreach(array_unique($m[1]) as $p)
            $data = str_replace('./?p='.$p, $b['pages'][$p].'.html',$data);

        file_put_contents($b['buildPath'].$pageName.'.html', $data);
    }

    foreach($b['dirs'] as $dir)
        recurse_copy($dir.'/', $b['buildPath'].$dir.'/', $b['exclude']);

    file_put_contents(CHANGELOG_FILE, $_POST['changelog']);

    echo 'Build done!';
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Build</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name='robots' content='noindex,nofollow' />
        <style>
            body
            {
                background: none repeat scroll 0 0 #E5E5E5;
                font-family: Arial;
                font-size: 14px;
                line-height: 16px;
            }
            legend
            {
                font-weight: bold;
            }
            fieldset
            {
                border-radius: 10px 10px 10px 10px;
            }
            textarea
            {
                display: block;
                margin: 10px 0;
                width: 99%;
                height: 810px;
                border-radius: 5px;
                border: 1px solid #CCC;
                font-family: monospace;
                font-size: 12px;
                padding: 5px;
            }
            label
            {
                font-weight: bold;
                font-size: 12px;
            }

        </style>
    </head>
    <body>
        <form action="" method="post">
            <fieldset>
                <legend>Build</legend>
                <label for="changelog">CHANGELOG.txt</label>
                <textarea id="changelog" name="changelog"><?php if(file_exists(CHANGELOG_FILE)) echo file_get_contents(CHANGELOG_FILE); ?></textarea>
                <input type="submit" value="Build!">
            </fieldset>
        </form>
    </body>
</html>
