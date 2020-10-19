![](https://raw.githubusercontent.com/SnagiX/ExCursy_API/master/assets/img/logo/FHD%20ExCursy%20API%20Logo%20Light.png)
ExCursy API - changeable micro-framework for web AR-applications, which based on PHP (MVC architecture).
Front-end AR applications should be created on AR.js library (see ExCursy project)

## Installation
1. Put code into your folder

2. In "core/config/config.json" edit mysql information: 
```json
"mysql": {
        "host": "yourHost",
        "username": "yourUsername",
        "password": "yourPassword",
        "db": "yourDatabase",
        "charset": "utf8mb4",
        "port": 3306
}
```
3. You also can set your custom values in config (remove CORS-headers for example): 
```json
"headers_prepared": {
        "Access-Control-Allow-Origin: *",
        "Access-Control-Allow-Methods: GET, POST"
}
```

4. Add templates of tables on your server (or virtual machine)
