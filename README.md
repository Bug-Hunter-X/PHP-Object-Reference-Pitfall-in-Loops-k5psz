# PHP Object Reference Pitfall in Loops

This repository demonstrates a common and subtle bug in PHP related to object references and loops.  When you modify an object property through a reference inside a loop, and the object is referenced multiple times, changes made in one iteration can unexpectedly affect other iterations.

The `bug.php` file contains the buggy code, while `bugSolution.php` shows the corrected version and explanation.

## Bug Description

The bug arises from the misuse of pass-by-reference in a foreach loop.  Modifications made through a reference directly change the original object.  This is particularly problematic in loops, where the same object is handled multiple times.

## Solution

The solution involves avoiding pass-by-reference in the loop to create copies of the objects thereby preventing unintentional side effects and ensuring that each object's property is modified independently.