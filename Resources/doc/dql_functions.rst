SladUsefulBundle - make typical things easier

DQL functions
=============

Configuration
-------------

To use provided by SladUsefulBundle DQL functions you should configure your doctrine:

// app/config/config.yml

::

    doctrine:
        ...
        orm:
            entity_managers:
                default:
                    dql:
                        datetime_functions:
                            datediff: Slad\UsefulBundle\DQL\DateDiff
                        numeric_functions:
                            if: Slad\UsefulBundle\DQL\IfStatement
                            ifnull: Slad\UsefulBundle\DQL\IfNull
                            round: Slad\UsefulBundle\DQL\Round


Usage
=====

IF
------

::

    $em->createQuery('SELECT IF(s.a>s.b, s.a, s.b)
                      FROM AcmeDemoBundle:Sale s')

IFNULL
------

::

    $em->createQuery('SELECT IFNULL(SUM(s.amount), 0)
                      FROM AcmeDemoBundle:Sale s')

ROUND
-----

::

    $em->createQuery('SELECT ROUND(s.amount, 2)
                      FROM AcmeDemoBundle:Sale s
                      WHERE s.id=1')


DATEDIFF
--------
Returns days between two dates

::

    $em->createQuery('SELECT DATEDIFF(s.date_shipped, s.date_ordered)
                      FROM AcmeDemoBundle:Sale s
                      WHERE s.id=1')
