# lemp-dev-containers
docker compose setup Nginx 17.1 | PHP 8.1.1 | PostgresQL 14.1

Docker & Docker Compose configurations for PHP development.  
This setup comes with:
- PHP 8.1.1
- Nginx (1.17-alpine)
- PostgresQL 14.1  

# Requirements  
- [Docker Engine](https://www.docker.com) (rootless recommended)
- [Docker Compose](https://docs.docker.com/compose/install/)

# Getting Started

### 1. Clone the repository

```bash
git clone https://github.com/BoilingSoup/lemp-dev-containers.git Docker-Lemp
```  
 
cd into the new directory  
```bash 
cd Docker-Lemp
```

### 2. Ready for development!
- To start the LEMP server use this command:  
```bash 
docker compose up -d
```  

- Go to `localhost:8000` on your web browser and you should see the PHP info page.  

- The project root folder is the `public` directory.

- To stop the LEMP server use this command:  
```bash 
docker compose down
```  

# Database Login  
You can access the database on port `5432` of your host machine by using an app such as [dbeaver](https://dbeaver.io/).  
Some default credentials are set in `docker-compose.yml`  
- POSTGRES_USER: postgres
- POSTGRES_PASSWORD: password
- POSTGRES_DB: postgres 


## Contributing
Pull requests are welcome.
