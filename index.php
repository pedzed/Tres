<?php

// The client should not be able to access this directory, because this is not 
// the public directory.

header('Location: public_html/');
die();
