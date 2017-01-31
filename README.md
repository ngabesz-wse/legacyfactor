# legacyfactor - Possible solutions for the problems in the master branch

You can find the refactored classes and unit tests under the src directory.

## Example1

When you try to write a test for the lowerCase method you will notice that it
has a dependency on the filesystem (using glob()). This makes the method untestable 
because unit tests must be independent and isolated.
A possible solution is to hide the glob function to a separate method in the class.

## Example2

You can use the new method trick from Example1 here too. It also works with static calls.

## Example3

At first sight this looks like very similar to the second example. 
You can see a couple of static calls that could be hidden in methods like earlier but in this case it will not work. 
The problem is that our main method is static too so you cant create a mock of it.

In this case the only solution is to move the logic into a separate class which is not static and
set the return values of static methods to our new class and write tests for it. 

## Example4

In this example we are facing with a dependency of an external service.
The first step is to locate what should we cover with test.
We chan rely on PHP's SoapClient class so this dont need to be tested.
The only thing we can test is the logic in addOssze method 
to ensure that SoapClient's __soapCall method will be called with the right parameters.
To achieve this, first you have to create a mock of the SoapClient object.
There is a problem with this because the class is created in the ClearAdminSoap's 
constructor so there is no way to replace it with a mock.
One possible solution is to create a setter method to SoapClient what can override 
the object which was created by the constructor.
This works fine but not the cleanest solution because you will modify the interface of the class.
A more cleaner way if you use the new method technique like in Example1 and Example2 
and move the instantiation of SoapClient to a new method.
In this way you can test that your mock will be called with the expected parameters. 