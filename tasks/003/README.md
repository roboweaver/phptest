Pascal's Triangle
-----------------

This quiz is a complete ripoff of the [rubyquiz](http://rubyquiz.com/quiz84.html) which is a complete ripoff of a classical math concept.  Basically this test is about formatting some output as a pretty-printed string.  It can be solved many different ways so the test only mandates that your string matches the expected string.

Here is an example:
```
$ pascal 10
                           1                            
                        1     1                         
                     1     2     1                      
                  1     3     3     1                   
               1     4     6     4     1                
            1     5    10    10     5     1             
         1     6    15    20    15     6     1          
      1     7    21    35    35    21     7     1       
   1     8    28    56    70    56    28     8     1    
1     9    36    84    126   126   84    36     9     1
```

Suggestions
-----------

I found it very helpful to create smaller unit tests along the way rather than just using the top-level tests provided. I added tests for things like making sure was generating the rows of numbers correctly before I bothered doing any sort of formatting.  It helped to break up the task into smaller chunks.

Running the Test
----------------

* $ vagrant ssh
* $ cd /vagrant/tasks/003
* $ phpunit --colors test