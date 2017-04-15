## 12 TDDs

This is 12 days of code katas for TDD (test driven development). John Cleary started this and I wanted to be part of this.

Original blog post is here:

- [12 TDDS OF CHRISTMAS](http://www.wiredtothemoon.com/2012/12/12-tdds-of-christmas)

There are my results in Laravel v5.4.

### Day 1 - Calc Stats

Your task is to process a sequence of integer numbers
to determine the following statistics:

- minimum value
- maximum value
- number of elements in the sequence
- average value

For example: [6, 9, 15, -2, 92, 11]

- minimum value = -2
- maximum value = 92
- number of elements in the sequence = 6
- average value = 21.833333

### Day 2 - Number Names

Spell out a number. For example

- 99 –> ninety nine
- 300 –> three hundred
- 310 –> three hundred and ten
- 1501 –> one thousand, five hundred and one
- 12609 –> twelve thousand, six hundred and nine
- 512607 –> five hundred and twelve thousand,
- six hundred and seven
- 43112603 –> forty three million, one hundred and
- twelve thousand,
- six hundred and three

### Day 3 - Mine Field

A field of N x M squares is represented by N lines of exactly M characters each. The character ‘*’ represents a mine and the character ‘.’ represents no-mine.

Example input (a 3 x 4 mine-field of 12 squares, 2 of
which are mines)

3 4

\* . . . 

. . * .

. . . .

Your task is to write a program to accept this input and produce as output a hint-field of identical dimensions where each square is a * for a mine or the number of adjacent mine-squares if the square does not contain a mine.

Example output (for the above input)

\* 2 1 1

1 2 * 1

0 1 1 1

### Day 4 - Monty Hall

Suppose you’re on a game show and you’re given the choice of three doors. Behind one door is a car; behind the others, goats. The car and the goats were placed randomly behind the doors before the show.

The rules of the game show are as follows:

After you have chosen a door, the door remains closed for the time being. The game show host, Monty Hall, who knows what is behind the doors, now has to open one of the two remaining doors, and the door he opens must have a goat behind it. If both remaining doors have goats behind them, he chooses one randomly. After Monty Hall opens a door with a goat, he will ask you to decide whether you want to stay with your first choice or to switch to the last remaining door.

For example:
Imagine that you chose Door 1 and the host opens Door 3, which has a goat. He then asks you “Do you want to switch to Door Number 2?” Is it to your advantage to change your choice?

Note that the player may initially choose any of the three doors (not just Door 1), that the host opens a different door revealing a goat (not necessarily Door 3), and that he gives the player a second choice between the two remaining unopened doors.

Simulate at least a thousand games using three doors for each strategy and show the results in such a way as to make it easy to compare the effects of each strategy.

## Author

[Dusan Perisic](http://dusanperisic.com)