# ExKyrsia_API
ExKyrisa API for actions in GitHub pages (upload markers, send some data, etc.)

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
    You also can set your headers (or remove CORS for example):
    `"headers_prepared": {
        "Access-Control-Allow-Origin: *",
        "Access-Control-Allow-Methods: GET, POST"
    }`

3. Add templates of tables on your server (or virtual machine)
