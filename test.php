<?php
/**
 * Created by PhpStorm.
 * User: Isaac
 * Date: 10/11/2017
 * Time: 11:40 AM
 */

if(password_verify("root", '$2y$10$XbL/IqdQBHlOuYNaEU5E6elRfkq8Xxh7wp7W.zIwo32UYDJD1OtW.'))
    echo "true";
else
    echo "false";