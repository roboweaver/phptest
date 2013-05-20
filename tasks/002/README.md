Chat Application Library
---------------------------

One of the core ideas of good object-oriented design is that the code should
be reusable. This usually means that whether your code gets run as part of a
website, part of a desktop application, or part of a command-line application
it can be reused without modification.

In this task you will implement a small chat application library. You can
assume that someone else has the job of connecting clients to your library
through a command-line application (or some other type of application).

What they need from you is a library that implements the broadcasting of
messages to everyone in a chat room.  Once the message gets sent back to the
recipient objects their application will handle the actual network IO.

Structure
---------

The team in charge of building the final application has put together some
pseudo-code to express how they would like to interact with your library and
which features they will need. Their expectations can be found in
test/ChatTest.php.

The team expects you to add some additional tests for the specific objects you
end up using as part of your design, but they have provided the high-level
acceptance tests for you.

Running the Test
----------------

* $ vagrant ssh
* $ cd /vagrant/tasks/003
* $ phpunit --colors test