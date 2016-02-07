# О чем #
Файл node.tpl.php и модуль CCK

Как использовать custom CCK fields в node.


Вот такой великолепный комментарий с drupal.org:

[individual fields (cck)](http://http://api.drupal.org/api/drupal/modules--node--node.tpl.php/6#comment-1133)

Posted by vannus on March 21, 2010 at 6:47pm

if you want control over individual fields:-
(probably best done in a node-mycontenttype.tpl.php file)

comment/delete print $content;

replace with print $field\_mycckfield\_rendered;.
(you can get the field\_mycckfield from the 'Name' column in 'Manage Fields' page of your content type)

- V