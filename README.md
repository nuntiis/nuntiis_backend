![travis-status](https://travis-ci.org/nuntius-organization/nuntius_drupal.svg)

## Nuntius

What is nuntius? Nuntius is a plugable real time chat cross platforms and 
frameworks which not fixed on a specific technology stack.

Usually, project maintainers will choose their favorite stack: Angular as front 
end, nodeJS and mongo as backend or maybe reactJS as front end and Symfony as
backend(when Symfony can connect to several databases).

But how developers, which not fit to those templates could use this awesome
project? The answer is simple - the projects should be decoupled. The nuntius
organization will provide backend in several projects: Drupal, Symfony, Lumen,
Goo language, Java, silex etc. etc. etc. When they all provide the same
endpoint and logic.

The organization will provide front end in: Angular, ReactJS, Elm lang, backbone 
JS and any other front end solution you could think of and they all talk with 
the backend in the same way.

What about web socket service? Pusher? Socket IO? Firebase? The projects provided
by the Nuntius organization will also need to handle that. Backend and front end.

What about QA? How can I know the project match the standard of the Nuntius
organization? Nuntius organization will also provide a set of Behat test suites
for the backend and for the front end and you could know if the project you want
match the workflow of Nuntius.

All you have to do is just choose the stack you desire of and start provide chat
for your organization.

## Nuntius for Drupal.
After understanding what is Nuntius you can now know that this is a backend for
Drupal and it's combined from the next data structure:

* Ticker - tickers provide links to routes in the system. They will appear on
the left side(or right if we talking on a RTL site). It's combined from:
  * title - The title of the ticker.
  * status - Available or not.
  * Icon - Any vector css font you can think of.


* Message - The messages is what it sound, message. It's construct from:
  * text - The message text.
  * Owner - The user which post the message.
  * Room ID - In which room the message should appear.


* Room - The room will display the messages relate to that room. Just a like a
room on IRC, Gitter or Slack. it's construct from:
  * Title - the title of the room.
  * Audience - which people should be in the room. When this a private message
  between to people only two people are the audience. If it's a group then only
  the people belong to the group will be listed.
  * Privacy - Determine if the room is between two people, Group messaging, or
  public room.
  
  
* Room audience - Each private room will need to know the users of the room. 
it's construct from:
  * Room ID - The room ID which the audience bind the user to.
  * User ID - the User ID.


* Activity stream - Just like the notification center or activity stream in 
Facebook the user should have it on Nuntius. It's construct from:
 * Text - the tex of the message.
 * User - which user owns it.
 * Location - if it's in the notification center or just in the normal activity
 stream.
 * Notifying - Determine if the user should get notification from it. Usually 
 when the message appear in the notification center the should notify but there 
 could be edge cases covered by the front end.


## How can I join in?
You can start contribute to one of the projects if you want your own language
ping me on Twitter - @RoySegall and i'll create for you a project when you can
start contribute or just start your own repo.

# Nuntius as an application
There is a plan for Ionic and electron boilerplate but it's in the far future.
