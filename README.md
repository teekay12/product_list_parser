# product_list_parser

This package parses a csv, tsv files and validates with some certain checks before returning an output as a csv file.

This package is also capable of grouping unique products with there respective count and it checks for required input, whereby if not found, a log of this items with there line numbers are returned in a text file.

I have also included some test scripts for unit testing and feature testing.

Its simple to install, you can pull or download the project on your local machine.

After which you type composer install on your terminal to install phpunit dependencies, and the package is ready to use.

you can simply test by typing below

php index.php -f products.csv -u=unique-combo.csv

the flags used above

-f file to be parsed which is required.

-u the name of the grouped file to return (not required)

Thanks, Happy Coding
