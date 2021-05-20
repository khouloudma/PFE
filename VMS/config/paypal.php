<?php
// config paypal 

return [ 
    'client_id' => 'AQ-pfQX5Us0NdQJYpduRy5kh1JkUSxtcf4jlQGTXeoUhUoZohORi7c2mJJhkB9zUyMXKeMX6nNu-NNrQ',
    'secret' =>  'EIJQYjkNkf_JFU5PfK0QtIWuCTMX3rdMZzrIp2XWnqi0mXJ67xwGCivg_gLjHR6Pdw-DbrQiuLKdQgD9',
    'settings' => array(
         'mode' => 'sandbox', 
       // 'mode' => 'live',
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'ERROR'
    ),

   
];