# Technical test summary

## Installation steps
To run development environment in Docker, first build the image
```
docker build --no-cache -t cmp-app .docker
```
Then, run the container
```
docker run -itd -v `pwd`:/var/www/cmp-app --rm --name cmp-app cmp-app
```
And finally, install dependencies
```
docker exec -it cmp-app composer install
```

## Running the code
To run the code, execute one of the following commands (example source files are loaded into repository for easy testing the code)

To import videos from glorf
```
docker exec -it cmp-app bin/console app:import-videos glorf
```
To import videos from flub
```
docker exec -it cmp-app bin/console app:import-videos flub
```

## Executing  tests
To run the application tests, run the following command
```
docker exec -it cmp-app bin/phpunit
```