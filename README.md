How to run
==========
The application was initially designed to run as a command line program. In the end, I had enough time to do a UI as well (refer to Running this in a server). The command,
```
php cli.php input_test.txt 
```
will start a sequence and will display each step as a text representation. 

Since player needs to enter the initial step (grid of cells), this application uses a text file. The input file contains the initial input in the form of a grid of spaces and zeros (ex. input_test.txt). 

Running tests
=============
There are two unit test files included. Assuming phpunit is setup to run as command,following commands will run the tests.
```
phpunit GridTest.php
phpunit GameTest.php
```

Running this in a server
========================
I have included a simple frontend to invoke the PHP backend as an API, index.html. Just place the director in the PHP server.

PHP Version
===========
I used PHP 5, syntax, not the PHP 7 with the strict mode. No auto-loading method is used.

Coding Exercise
===============

This is the coding test that we use for developers at sidekicker.com.au. 

The aim is to demonstrate how you approach thinking about problems and translating them to code. Fork this repository to your own, spend around 3 hours working on a solution and then submit it back to us as a pull request as though you were submitting a pull request for a task you'd done in a work environment.

Please use modern PHP or Golang, whichever you have the most experience with.

## Challenge: Conway's Game of Life

The Game of Life, also known simply as Life, is a cellular automaton devised by the British mathematician John Horton Conway in 1970.
The "game" is a zero-player game, meaning that its evolution is determined by its initial state, requiring no further input. One interacts with the Game of Life by creating an initial configuration and observing how it evolves.

http://en.wikipedia.org/wiki/Conway%27s_Game_of_Life

![Game of Life](https://images.chaostangent.com/2009/08/gameoflife-1.gif)
![Game of Life](https://images.chaostangent.com/2009/08/gameoflife-2.gif)

### Game Rules

* A cell can be made "alive"
* A cell can be "killed"
* A cell with fewer than two live neighbours dies of under-population
* A cell with 2 or 3 live neighbours lives on to the next generation
* A cell with more than 3 live neighbours dies of overcrowding
* An empty cell with exactly 3 live neighbours "comes to life"
* The board should wrap

### Implementation

It's up to you how you implement this, especially how you render the visual representation of the game. If you are short for time, it's ok to not do any visual rendering at all, but it should be clear how that would be implemented in future. Tests are also optional, but looked upon very favourably if included. 
