PHP Test
========

This repo is aimed at making it easy to formally specify some coding challenges that can be worked on by newer coders and/or new applicants.

It is heavily inspired by projects like the [Ruby Koans](http://rubykoans.com/), but differs in that it is designed to be a mentoring tool.

Getting the tests to pass is usually just a way to guide progress. It is expected that most of the tasks presented should be discussed with another programmer once the tests are passing.  The other programmer should provide design feedback and may ask to have the code re-written.

Setup
=====
To work on the tasks as a student you should:

 * have vagrant setup on your computer (please see wiki pages for help on this)
 * fork this repository
 * git clone your fork
 * cd to/your/cloned/fork
 * $ vagrant up
 * $ vagrant ssh
 * $ cd /vagrant/tasks/001
 * $ phpunit test.php
 * start coding your solutions

To work on adding tasks to this codebase you should:

 * have vagrant setup on your computer (please see wiki pages for help on this)
 * git clone this repository
 * cd to your copy
 * $ vagrant up
 * $ vagrant ssh
 * $ cd /vagrant/tasks/001
 * $ phpunit test.php
