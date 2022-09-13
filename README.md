# Product List Parser

This package parses a csv, tsv files and validates with some certain checks before returning an output as a csv file.

This package is also capable of grouping unique products with there respective count and it checks for required input, whereby if not found, a log of this items with there line numbers are returned in a text file.

###### Table of Contents

<!-- MarkdownTOC -->

- [Getting Started](#getting-started)
    - [Prerequisites](#prerequisites)
    - [Installing](#installing)
        - [Installing required packages](#installing-required-packages)
    - [Running-the-package]
    - [Testing]
        - [Running-tests-scripts]
- [Authors](#authors)
- [License](#license)

<!-- /MarkdownTOC -->

## Getting Started

These instructions will get your copy of the project up and running on your
local machine for development and testing purposes.

### Prerequisites

You will need the following running on your local development machine.

- PHP 7.*

### Installing

Follow the instructions below to get this up and running in a few minutes.

#### Installing required packages

Before doing anything you will need to install the required packages using [composer](https://getcomposer.org/). 

```console
$ composer install
Loading composer repositories with package information
Installing dependencies (including require-dev) from lock file
```

#### Run Package

To run the package (see command below) 

```console
$ php index.php -f products.csv -u=unique-combo1.csv
```

-f || -file option is *required* and this is the file to be parsed. This file are stored in public/files directly.

if the -u || -unique-combinations file *(not required)* is defined, the output will be saved in the public/ folder and if there are any error while excuting the package a log file will be generated which is then stored in public\logs folder.

A summary of the process is printed out at the end of the execution.

### Testing

Once you have successfully ran the package on your machine you can run the made available test using the command below.

```console
$ .\vendor\bin\phpunit --verbose src/tests/productparsertests.php
```

## Authors

- Taofik Kareem - [@teekay12][author-1]

## License

This project is not licensed

Thanks, Happy Coding