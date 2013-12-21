<?php
class InterfaceDoesNotExistTest extends \PHPUnit_Framework_TestCase
{
    public function testInterfaceDoesNotExistButCanBeMocked()
    {
        $role = $this->getMockBuilder('\\My\\NonExistentInterface')
            ->getMock();

        $this->assertInstanceOf('\\My\\NonExistentInterface', $role);
    }

    public function testMethodsOfNonExistentInterfaceCanBeStubbed()
    {
        $role = $this->getMockBuilder('\\My\\NonExistentInterface')
            ->setMethods(array('findById'))
            ->getMock();

        $data = array('id' => 1);
        $role->expects($this->any())
            ->method('findById')
            ->with(1)
            ->will($this->returnValue($data));

        $this->assertEquals($data, $role->findById(1));
    }
}
