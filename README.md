# BotHelp test task

## Installation

1. If not already done, [install Docker Compose](https://docs.docker.com/compose/install/) (v2.10+)
2. Run `docker compose build --no-cache` to build fresh images
3. Run `docker compose up --pull always -d --wait` to set up and start a fresh Symfony project
4. Open `https://localhost` in your favorite web browser and [accept the auto-generated TLS certificate](https://stackoverflow.com/a/15076602/1352334)
5. Run `docker compose down --remove-orphans` to stop the Docker containers.

## Usage

```
docker exec -it bothelp-test-task-php-1 bash
composer install
./bin/console app:generate-request-events > json.txt
```

Run multiple instances of this command:

```
./bin/console mes:con async -vv
```

Send a POST request to the `https://localhost/event/handle` route with the contents of json.txt in the body of the request.

Messages stats can be checked at http://localhost:15672/ (login and password are both "guest")
