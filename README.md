# SimpleHTTPDNS
A very simple HTTPDNS Server Script based on PHP.

一个很简单的HTTPDNS服务器PHP实现。

# Install
Upload Server/httpdns.php to your htdocs, and set correct permission to let users can access this file at http(s)://yourhost:port/dirofthisphpfile/httpdns.php
To create Database tables, run http(s)://yourhost:port/dirofthisphpfile/install.php(Change config.php first)

上传到你的服务器，设定适当的权限让用户可以访问httpdns.php，然后用install.php安装（先改config.php里的数据库信息）。
#Useage
Request the domain by use Get method.

Parameter 'src' means users networks, you can define it yourself.

http(s)://yourhost:port/dirofthisphpfile/httpdns.php?domain=xxxxxx&src=xxx

If src not given, it will ignore src column.

直接用Get方法访问httpdns.php。比如上面这行例子。src参数用于区分用户网络，比如电信联通什么的，用于调度最近的机房ip。如果没给src参数，那么select数据库的时候会忽视src这一栏。

The return valure is JSON of your request domain and the IP address of this domain you request.

会返回一个类似下面格式的JSON。

Like this :

```JSON 
{"domain":"example.com","ip":"93.184.216.34"}
```

If the domain was not found, will return null.

如果没找到域名会返回ip是null，如下

Like this :

```JSON
 {"domain":"awrongdomain","ip":null}
```

And if not found a Get method request, it will return "Wrong Request!"

如果请求方式不对什么的，就会返回"Wrong Request!"

# Admintools
Domain DB management page at http(s)://yourhost:port/dirofthisphpfile/admintools/changedomaindb.php

一个简单的管理数据库的web界面。

Cache management page at http(s)://yourhost:port/dirofthisphpfile/admintools/showcache.php

一个简单的查看从isp获取的ip信息的缓存页。

#TODO List
~~Add cache function添加缓存功能省着每次被请求不在数据库的域名的时候都查询DNS~~

~~Add priority level of IPs添加优先级控制~~

~~Given different IPs if users use different networks添加区分用户网络以调度合适运营商机房的功能~~
~~Add load balancing function based on priority level添加简单的基于优先级的负载均衡功能~~
