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

## How does it work?
There are 3 main classes: "Reader", "Parser" and "Importer".
- Reader: used to retrieve the content from the source.
- Parser: transforms the plain content into PHP array for easy manipulation.
- Importer: based on the data structure of each source, creates the videos to be saved into our database (once the database is implemented).

Each "Importer" (with its corresponding "Reader" and "Parser") should be defined in the file "config/services.yaml" and then inyected into "src/Service/Importer/ImporterFactory" service.

This approach allows to change any of the Reader, Parser and url for each source directly into the services config file without having to change the Importer implementations.

## Further improvements
1. Control exceptions, for example if source file does not exist, or format is wrong.
2. Write some integration tests, so we can be sure that the whole process is working.
3. Extract the function "import" of the Importer classes to a parent abstract class (creating kind of a template pattern design).
4. For sure, any improvement that is suggested by possible colleagues.
5. Install and implement static code analyser such as PHP CS Fixer and PHPStan.
