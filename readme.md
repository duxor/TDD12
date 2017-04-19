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

\* . . .  <br>
. . * . <br>
. . . .

Your task is to write a program to accept this input and produce as output a hint-field of identical dimensions where each square is a * for a mine or the number of adjacent mine-squares if the square does not contain a mine.

Example output (for the above input)

\* 2 1 1 <br>
1 2 * 1 <br>
0 1 1 1

### Day 4 - Monty Hall

Suppose you’re on a game show and you’re given the choice of three doors. Behind one door is a car; behind the others, goats. The car and the goats were placed randomly behind the doors before the show.

The rules of the game show are as follows:

After you have chosen a door, the door remains closed for the time being. The game show host, Monty Hall, who knows what is behind the doors, now has to open one of the two remaining doors, and the door he opens must have a goat behind it. If both remaining doors have goats behind them, he chooses one randomly. After Monty Hall opens a door with a goat, he will ask you to decide whether you want to stay with your first choice or to switch to the last remaining door.

For example:
Imagine that you chose Door 1 and the host opens Door 3, which has a goat. He then asks you “Do you want to switch to Door Number 2?” Is it to your advantage to change your choice?

Note that the player may initially choose any of the three doors (not just Door 1), that the host opens a different door revealing a goat (not necessarily Door 3), and that he gives the player a second choice between the two remaining unopened doors.

Simulate at least a thousand games using three doors for each strategy and show the results in such a way as to make it easy to compare the effects of each strategy.

### Day 5 - Fizz Buzz

Write a program that prints the numbers from 1 to 100. But for multiples of three print “Fizz” instead of the number and for the multiples of five print “Buzz”. For numbers which are multiples of both three and five print “FizzBuzz”.

Sample output:

1 <br>
2 <br>
Fizz <br>
4 <br>
Buzz <br>
Fizz <br>
7 <br>
8 <br>
Fizz <br>
Buzz <br>
11 <br>
Fizz <br>
13 <br>
14 <br>
FizzBuzz <br>
16 <br>
17 <br>
Fizz <br>
19 <br>
Buzz <br>
… etc up to 100

### Day 6 - Recently-Used List

Develop a recently-used-list class to hold strings uniquely in Last-In-First-Out order.

A recently-used-list is initially empty.
The most recently added item is first, the leastrecently added item is last.
Items can be looked up by index, which counts from zero.
Items in the list are unique, so duplicate insertions are moved rather than added.
Optional extras:

Null insertions (empty strings) are not allowed.
A bounded capacity can be specified, so there is an upper limit to the number of items contained, with the least recently added items dropped on overflow.

##### In this case Singleton Design Pathern was implemented in the class RecentlyUsedList.

### Day 7 - Template Engine

Write a “template engine” meaning a way to transform template strings, “Hello {$name}” into “instanced” strings. To do that a variable->value mapping must be provided. For example, if name=”Cenk” and the template string is “Hello {$name}” the result would be “Hello Cenk”.
- Should evaluate template single variable expression:
mapOfVariables.put(“name”,”Cenk”);
templateEngine.evaluate(“Hello {$name}”, mapOfVariables)
=>   should evaluate to “Hello Cenk”
- Should evaluate template with multiple expressions:
mapOfVariables.put(“firstName”,”Cenk”);
mapOfVariables.put(“lastName”,”Civici”);
templateEngine.evaluate(“Hello {$firstName} {$lastName}”, mapOfVariables);
=>   should evaluate to “Hello Cenk Civici”
- Should give error if template variable does not exist in the map:
map empty
templateEngine.evaluate(“Hello {$firstName} “, mapOfVariables);
=>   should throw missingvalueexception
- Should evaluate complex cases:
mapOfVariables.put(“name”,”Cenk”);
templateEngine.evaluate(“Hello ${{$name}}”, mapOfVariables);
=>   should evaluate to “Hello ${Cenk}”

### Day 8 - Range

In mathematics we denote a range using open-closed bracket notation: [0,10) means all real numbers equal to or greater than zero, but less than ten. So 0 lies in this range, while 10 does not.

1. Develop an integer range class, that has the following operations:
Construction.

For example: r = new Range(0,10) // modify to fit your language's syntax

Checking whether an integer lies in the range. 

What name do you think is appropriate?
Intersection of two ranges, creating a new range consisting of all integers that are in both ranges.

For example, the intersection of range [0..3] (numbers 0, 1, 2 & 3) and range [2..4] is the range [2..3]

What do you think should happen if the intersection is empty?

2. Develop another class to represent floating point ranges, with the same operations.

While developing the floating point range class, think about how it differs from the integer range.

Is it possible to modify the behaviour of one of them to become more consistent with the behaviour of the other? The more uniform their behaviour, the easier the classes will be to use.

If you modify one of the classes – do you feel confident you do not break anything? If you don’t feel confident, what can you do about that?

### Day 9 - Bowling Game

Write a program, to score a game of Ten-Pin Bowling.

The scoring rules:

- Each game, or “line” of bowling, includes ten turns, or “frames” for the bowler.
- In each frame, the bowler gets up to two tries to knock down all ten pins.
- If the first ball in a frame knocks down all ten pins, this is called a “strike”. The frame is over. The score for the frame is ten plus the total of the pins knocked down in the next two balls.
- If the second ball in a frame knocks down all ten pins, this is called a “spare”. The frame is over. The score for the frame is ten plus the number of pins knocked down in the next ball.
- If, after both balls, there is still at least one of the ten pins standing the score for that frame is simply the total number of pins knocked down in those two balls.
- If you get a spare in the last (10th) frame you get one more bonus ball. If you get a strike in the last (10th) frame you get two more bonus balls.
- These bonus throws are taken as part of the same turn. If a bonus ball knocks down all the pins, the process does not repeat. The bonus balls are only used to calculate the score of the final frame.
- The game score is the total of all frame scores.

Examples:

X indicates a strike <br>
/ indicates a spare <br>
(-) indicates a miss <br>
| indicates a frame boundary <br>

X|X|X|X|X|X|X|X|X|X||XX <br>
Ten strikes on the first ball of all ten frames. <br>
Two bonus balls, both strikes. <br>
Score for each frame == 10 + score for next two <br>
balls == 10 + 10 + 10 == 30 <br>
Total score == 10 frames x 30 == 300

9-|9-|9-|9-|9-|9-|9-|9-|9-|9-|| <br>
Nine pins hit on the first ball of all ten frames. <br>
Second ball of each frame misses last remaining pin. <br>
No bonus balls. <br>
Score for each frame == 9 <br>
Total score == 10 frames x 9 == 90 <br>

5/|5/|5/|5/|5/|5/|5/|5/|5/|5/||5 <br>
Five pins on the first ball of all ten frames. <br>
Second ball of each frame hits all five remaining <br>
pins, a spare. <br>
One bonus ball, hits five pins. <br>
Score for each frame == 10 + score for next one <br>
ball == 10 + 5 == 15 <br>
Total score == 10 frames x 15 == 150 <br>

### Day 10 - Phone Numbers

Given a list of phone numbers, determine if it is consistent. In a consistent phone list no number is a prefix of another. For example:

- Bob 91 12 54 26
- Alice 97 625 992
- Emergency 911

In this case, it is not possible to call Bob because the phone exchange would direct your call to the emergency line as soon as you dialled the first three digits of Bob’s phone number. So this list would not be consistent.

### Day 11 - Poker Hands

A poker deck contains 52 cards – each card has a suit which is one of clubs, diamonds, hearts, or spades (denoted C, D, H, and S in the input data).

Each card also has a value which is one of 2, 3, 4, 5, 6, 7, 8, 9, 10, jack, queen, king, ace (denoted 2, 3, 4, 5, 6, 7, 8, 9, T, J, Q, K, A).

For scoring purposes, the suits are unordered while the values are ordered as given above, with 2 being the lowest and ace the highest value.

A poker hand consists of 5 cards dealt from the deck. Poker hands are ranked by the following partial order from lowest to highest.

<b>High Card:</b> Hands which do not fit any higher category are ranked by the value of their highest card. If the highest cards have the same value, the hands are ranked by the next highest, and so on.

<b>Pair:</b> 2 of the 5 cards in the hand have the same value. Hands which both contain a pair are ranked by the value of the cards forming the pair. If these values are the same, the hands are ranked by the values of the cards not forming the pair, in decreasing order.

<b>Two Pairs:</b> The hand contains 2 different pairs. Hands which both contain 2 pairs are ranked by the value of their highest pair. Hands with the same highest pair are ranked by the value of their other pair. If these values are the same the hands are ranked by the value of the remaining card.

<b>Three of a Kind:</b> Three of the cards in the hand have the same value. Hands which both contain three of a kind are ranked by the value of the 3 cards.

<b>Straight:</b> Hand contains 5 cards with consecutive values. Hands which both contain a straight are ranked by their highest card.

<b>Flush:</b> Hand contains 5 cards of the same suit. Hands which are both flushes are ranked using the rules for High Card.

<b>Full House:</b> 3 cards of the same value, with the remaining 2 cards forming a pair. Ranked by the value of the 3 cards.

<b>Four of a kind:</b> 4 cards with the same value. Ranked by the value of the 4 cards.

<b>Straight flush:</b> 5 cards of the same suit with consecutive values. Ranked by the highest card in the hand.

Your job is to rank pairs of poker hands and to indicate which, if either, has a higher rank.

Examples:

Input: Black: 2H 3D 5S 9C KD White: 2C 3H 4S 8C AH <br>
Output: White wins – high card: Ace

Input: Black: 2H 4S 4C 2D 4H White: 2S 8S AS QS 3S <br>
Output: Black wins – full house

Input: Black: 2H 3D 5S 9C KD White: 2C 3H 4S 8C KH <br>
Output: Black wins – high card: 9

Input: Black: 2H 3D 5S 9C KD White: 2D 3H 5C 9S KH <br>
Output: Tie

### Day 12 - Harry Potter

To try and encourage more sales of the 5 different Harry Potter books they sell, a bookshop has decided to offer discounts of multiple-book purchases.

One copy of any of the five books costs 8 EUR.

If, however, you buy two different books, you get a 5% discount on those two books.

If you buy 3 different books, you get a 10% discount.

If you buy 4 different books, you get a 20% discount.

If you go the whole hog, and buy all 5, you get a huge 25% discount.

Note that if you buy, say, four books, of which 3 are different titles, you get a 10% discount on the 3 that form part of a set, but the fourth book still costs 8 EUR.

Your mission is to write a piece of code to calculate the price of any conceivable shopping basket (containing only Harry Potter books), giving as big a discount as possible.

For example, how much does this basket of books cost?

2 copies of the first book <br>
2 copies of the second book <br>
2 copies of the third book <br>
1 copy of the fourth book <br>
1 copy of the fifth book <br>

One way of group these 8 books is: <br>
1 group of 5 –> 25% discount (1st,2nd,3rd,4th,5th) <br>
+1 group of 3 –> 10% discount (1st,2nd,3rd) <br>
This would give a total of <br>
5 books at a 25% discount <br>
+3 books at a 10% discount <br>
Giving <br>
5 x (8 – 2.00) == 5 x 6.00 == 30.00 <br>
+3 x (8 – 0.80) == 3 x 7.20 == 21.60 <br>
For a total of 51.60

However, a different way to group these 8 books is: 

1 group of 4 books –> 20% discount (1st,2nd,3rd,4th) <br>
+1 group of 4 books –> 20% discount (1st,2nd,3rd,5th) <br>
This would give a total of <br>
4 books at a 20% discount <br>
+4 books at a 20% discount <br>
Giving <br>
4 x (8-1.60) == 4 x 6.40 == 25.60 <br>
+4 x (8-1.60) == 4 x 6.40 == 25.60 <br>
For a total of 51.20

And 51.20 is the price with the biggest discount.

## Author

[Dusan Perisic](http://dusanperisic.com)