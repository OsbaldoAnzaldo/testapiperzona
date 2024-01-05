

## 1. Clonar repositorio
    git clone https://github.com/OsbaldoAnzaldo/testapiperzona.git

## 2. Configurar en .env base de datos
    
## 3. Ejecutar migraciones
    php artisan migrate
    php artisan migrate:fresh --seed

## 4. Iniciar servidor
    php artisan serve
    
## 5. Ruta documentacion Swagger
    127.0.0.1:8000/api/documentation

## 6. Generar token
    email: admin@perzona.com
    password: 12345678
    127.0.0.1:8000/api/login


## 7. End potins
    Authorization : Bearer Token
    127.0.0.1:8000/api/logout
    127.0.0.1:8000/api/directors
    127.0.0.1:8000/api/titles



