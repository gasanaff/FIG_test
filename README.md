## Requirements
- make
- docker (docker-compose)

## Usage
- `make build` - first build and run application
- `make up` - run application
- `make down` - stop application

## API
- `GET /localhost:8088/api/stores` - get all stores
- `GET /localhost:8088/api/products` - get all products
- `GET /localhost:8088/api/products?only_with_user=true` - get all products with user only
