<?php

namespace rvilbrandt\gamebook\Loader;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-04-26 at 13:46:56.
 */
class JsonTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var JsonFile
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new JsonFile;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers rvilbrandt\gamebook\Loader\Json::setFilePath
     */
    public function testSetFilePath() {
        $this->assertNull($this->object->setFilePath(__DIR__ . "/../../data/gamebook_valid.json"));
    }
    
    /**
     * @covers rvilbrandt\gamebook\Loader\Json::setFilePath
     * @expectedException rvilbrandt\gamebook\Loader\FileNotFoundException
     */
    public function testSetFilePathNonExistingFile() {
        $this->object->setFilePath("doesnotexist.json");
    }

    /**
     * @covers rvilbrandt\gamebook\Loader\Json::load
     */
    public function testLoad() {
        $this->object->setFilePath(__DIR__ . "/../../data/gamebook_valid.json");
        $this->assertObjectHasAttribute("title", $this->object->load());
    }

    /**
     * @covers rvilbrandt\gamebook\Loader\Json::load
     * @expectedException \BadMethodCallException
     */
    public function testLoadWithoutFileSet() {
        $this->object->load();
    }
    
    /**
     * @covers rvilbrandt\gamebook\Loader\Json::load
     * @expectedException rvilbrandt\gamebook\Loader\InvalidFormatException
     */
    public function testLoadInvalidFormat() {
        $this->object->setFilePath(__DIR__ . "/../../data/gamebook_invalid_format.json");
        $this->object->load();
    }

}
