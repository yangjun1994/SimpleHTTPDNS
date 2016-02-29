# SimpleHttpDns
A very simple HttpDns Server Script based on PHP.

# Install
Upload Server/httpdns.php to your htdocs, and set correct permission to let users can access this file at http(s)://yourhost:port/dirofthisphpfile/httpdns.php
To create Database tables, run http(s)://yourhost:port/dirofthisphpfile/install.php

#Useage
Request the domain by use Get method.

http(s)://yourhost:port/dirofthisphpfile/httpdns.php?domain=xxxxxx


The return valure is JSON of your request domain and the IP address of this domain you request.

Like this :

```JSON 
{"domain":"example.com","ip":"93.184.216.34"}
```

If the domain was not found, will return null.

Like this :

```JSON
 {"domain":"awrongdomain","ip":null}
```

And if not found a Get method request, it will return "Wrong Request!"

# Admintools
Domain DB management page at http(s)://yourhost:port/dirofthisphpfile/admintools/changedomaindb.php

Cache management page at http(s)://yourhost:port/dirofthisphpfile/admintools/showcache.php

#TODO List
~~Add cache function~~

~~Add priority level of IPs~~

Given different IPs if users use different networks
