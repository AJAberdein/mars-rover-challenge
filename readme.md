


## Mars Rover Challenge

The Mars Rover challenge [outlined by google ]([https://code.google.com/archive/p/marsrovertechchallenge/](https://code.google.com/archive/p/marsrovertechchallenge/)) written in PHP and Laravel using TDD for Platform45.
This is also hosted on [http://platform45.ajaberdein.com/](http://platform45.ajaberdein.com/) if you want to just jump right into it and check it out right away.

## Requires:

PHP7+
[Composer](https://getcomposer.org/)

Make sure to  install Composer globally

## Installing

Pull the repo
run ```composer install```

## Running Web Interface
cd into the project
and just smash ```php artisan serve```

## Running CLI

smash a ```php artisan run:rover```
the CLI will prompt you step by step for information, just follow them or type ```end``` to begin analysis.

### Example Data
```
5 5
1 2 N
LMLMLMLMM
3 3 E
MMRMMRMRRM
```

## Tests
run ```vendor/bin/phpunit``` 
