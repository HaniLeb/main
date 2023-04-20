# MSPR - La Paillote du Soleil

This project is a fake restaurant website located in the South of France.

## Installation

Prerequisites: Docker, PHP 8.2, Composer and Symfony installed.

Clone this repository

```bash
git clone git@github.com:gBoole01/mspr-paillote-soleil.git
```

Go to the directory

```bash
cd mspr-paillote-soleil
```

Install dependencies

```bash
composer install
```

Run Docker Containers (`-d` to run it in detach mode)

```bash
docker-compose up --build
```

Run Symfony Development Server (`-d` to run it in detach mode)

```bash
symfony serve
```

### Services

- Symfony Web Server is accessible on `localhost:8000`.
- PHPmyadmin is accessible on `localhost:8080`.
- The Mail Catcher is accessible on `localhost:1080`.

_You can test the mailcatcher with `php bin/console mailer:test someone@example.com`_

## Security Disclaimer

This project is for educational purposes only, and any security measures implemented are intended to demonstrate basic security concepts only. The security measures implemented may not be sufficient for use in a production environment, and the user assumes all risk and responsibility for implementing any security measures in a production environment.

Furthermore, any data entered into this project may not be secure, and the user assumes all risk and responsibility for the security of their data. We recommend that users do not enter any sensitive or confidential information into this project.

## Contributors

- [FloriancC47](https://github.com/florianC47)
- [Tommy Dumora](https://github.com/TommyDumora)
- [HaniLeb](https://github.com/HaniLeb)
- [gBoole01](https://github.com/gBoole01)
