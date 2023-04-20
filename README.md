# MSPR - La Paillote du Soleil

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

- Symfony Web Server is accessible on `localhost:8000`.
- PHPmyadmin is accessible on `localhost:8080`.
- The Mail Catcher is accessible on `localhost:1080`.

## Contributors

- [FloriancC47](https://github.com/florianC47)
- [Tommy Dumora](https://github.com/TommyDumora)
- [HaniLeb](https://github.com/HaniLeb)
- [gBoole01](https://github.com/gBoole01)