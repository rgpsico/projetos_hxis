<?php
foreach($HTTP_GET_VARS as $key=>$value) 
{ 
$$key = $value; 
global $$key; 
}
foreach ($HTTP_POST_VARS as $key=>$value) 
{ 
$$key = $value; 
global $$key; 
}

foreach ($HTTP_COOKIE_VARS as $key=>$value) 
{ 
$$key = $value; 
global $$key; 
}

foreach ($HTTP_SERVER_VARS as $key=>$value)
{
$$key = $value;
global $key;
}
?>