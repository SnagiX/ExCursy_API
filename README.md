# ExKyrsia_API
ExKyrisa API - changeable micro-framework for web AR-applications, which based on PHP (MVC architecture).
Front-end AR applications should be created on AR.js library (see ExKyrsia project)

## Installation
1. Put code into your folder
2. In "core/config/config.json" edit mysql information:
	`"mysql": {
        "host": "yourHost",
        "username": "yourUsername",
        "password": "yourPassword",
        "db": "yourDatabase",
        "charset": "utf8mb4",
        "port": 3306
    }`
3. You also can set your custom values in config (remove CORS-headers for example):
    `"headers_prepared": {
        "Access-Control-Allow-Origin: *",
        "Access-Control-Allow-Methods: GET, POST"
    }`

4. Add templates of tables on your server (or virtual machine)
