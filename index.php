<?php

/*
|------------------------------------------------------------------------------
| Fallback - production environment
|------------------------------------------------------------------------------
| 
| In case of a misconfiguration, the client might get access to the project
| root. The client should not be able to access this directory in a production
| environment.
| 
*/
//TODO: Log error
header('Location: public_html/');
die();
