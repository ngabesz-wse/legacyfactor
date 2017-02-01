# legacyfactor - a mind-breaker about unit testing and legacy code

It often happens you have an old codebase without unit test and without Dependeny Injection. In these cases you cannot start a big refactoring first you want to cover the current behavior with tests. This example will help you how to deal with this situation and start to cover your old code with 
unit tests without taking too much risk.

Under src directory you will find examples of bad program designs.
Every example dir is a unique problem.
Your task is to refactor the code to make it testable and cover the class (or part of the class) with tests.

Imagine that these classes are part of a big and complex application so **you are not allowed to change
the signatures of methods nor the interface of a class** because somewhere it will break the application,
but if needed you can add new classes and methods.

If you would like to try to solve these problems, feel free to fork the repo.

The solutions can be found in the solutions branch.

Happy coding!
