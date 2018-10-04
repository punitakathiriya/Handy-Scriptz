//xml string
$xml_string="<?xml version='1.0'?>
<users>
   <user id='398'>
      <name>Foo</name>
      <email>foo@bar.com</name>
   </user>
   <user id='867'>
      <name>Foobar</name>
      <email>foobar@foo.com</name>
   </user>
</users>";

//load the xml string using simplexml
$xml = simplexml_load_string($xml_string);

//loop through the each node of user
foreach ($xml->user as $user)
{
   //access attribute
   echo $user['id'], '  ';
   //subnodes are accessed by -> operator
   echo $user->name, '  ';
   echo $user->email, '<br />';
}
