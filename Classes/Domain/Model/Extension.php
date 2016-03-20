<?php
namespace T3Monitor\T3monitoring\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Georg Ringer, www.sup7.at
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Extension
 */
class Extension extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     *
     * @var string
     * @validate NotEmpty
     */
    protected $name = '';

    /**
     * version
     *
     * @var string
     */
    protected $version = '';

    /**
     * insecure
     *
     * @var bool
     */
    protected $insecure = false;

    /**
     * nextSecureVersion
     *
     * @var string
     */
    protected $nextSecureVersion = '';

    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * lastUpdated
     *
     * @var \DateTime
     */
    protected $lastUpdated = null;

    /**
     * authorName
     *
     * @var string
     */
    protected $authorName = '';

    /**
     * updateComment
     *
     * @var string
     */
    protected $updateComment = '';

    /**
     * state
     *
     * @var int
     */
    protected $state = 0;

    /**
     * category
     *
     * @var int
     */
    protected $category = 0;

    /**
     * versionInteger
     *
     * @var int
     */
    protected $versionInteger = 0;

    /**
     * isUsed
     *
     * @var bool
     */
    protected $isUsed = false;

    /**
     * isOfficial
     *
     * @var bool
     */
    protected $isOfficial = false;

    /**
     * isModified
     *
     * @var bool
     */
    protected $isModified = false;

    /**
     * isLatest
     *
     * @var bool
     */
    protected $isLatest = false;

    /**
     * lastBugfixRelease
     *
     * @var string
     */
    protected $lastBugfixRelease = '';

    /**
     * lastMinorRelease
     *
     * @var string
     */
    protected $lastMinorRelease = '';

    /**
     * lastMajorRelease
     *
     * @var string
     */
    protected $lastMajorRelease = '';

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the version
     *
     * @return string $version
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Sets the version
     *
     * @param string $version
     * @return void
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Returns the insecure
     *
     * @return bool $insecure
     */
    public function getInsecure()
    {
        return $this->insecure;
    }

    /**
     * Sets the insecure
     *
     * @param bool $insecure
     * @return void
     */
    public function setInsecure($insecure)
    {
        $this->insecure = $insecure;
    }

    /**
     * Returns the boolean state of insecure
     *
     * @return bool
     */
    public function isInsecure()
    {
        return $this->insecure;
    }

    /**
     * Returns the nextSecureVersion
     *
     * @return string $nextSecureVersion
     */
    public function getNextSecureVersion()
    {
        return $this->nextSecureVersion;
    }

    /**
     * Sets the nextSecureVersion
     *
     * @param string $nextSecureVersion
     * @return void
     */
    public function setNextSecureVersion($nextSecureVersion)
    {
        $this->nextSecureVersion = $nextSecureVersion;
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the lastUpdated
     *
     * @return \DateTime $lastUpdated
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * Sets the lastUpdated
     *
     * @param \DateTime $lastUpdated
     * @return void
     */
    public function setLastUpdated(\DateTime $lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;
    }

    /**
     * Returns the authorName
     *
     * @return string $authorName
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * Sets the authorName
     *
     * @param string $authorName
     * @return void
     */
    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;
    }

    /**
     * Returns the updateComment
     *
     * @return string $updateComment
     */
    public function getUpdateComment()
    {
        return $this->updateComment;
    }

    /**
     * Sets the updateComment
     *
     * @param string $updateComment
     * @return void
     */
    public function setUpdateComment($updateComment)
    {
        $this->updateComment = $updateComment;
    }

    /**
     * Returns the state
     *
     * @return int $state
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Sets the state
     *
     * @param int $state
     * @return void
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * Returns the category
     *
     * @return int $category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets the category
     *
     * @param int $category
     * @return void
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * Returns the versionInteger
     *
     * @return int $versionInteger
     */
    public function getVersionInteger()
    {
        return $this->versionInteger;
    }

    /**
     * Sets the versionInteger
     *
     * @param int $versionInteger
     * @return void
     */
    public function setVersionInteger($versionInteger)
    {
        $this->versionInteger = $versionInteger;
    }

    /**
     * Returns the isUsed
     *
     * @return bool $isUsed
     */
    public function getIsUsed()
    {
        return $this->isUsed;
    }

    /**
     * Sets the isUsed
     *
     * @param bool $isUsed
     * @return void
     */
    public function setIsUsed($isUsed)
    {
        $this->isUsed = $isUsed;
    }

    /**
     * Returns the boolean state of isUsed
     *
     * @return bool
     */
    public function isIsUsed()
    {
        return $this->isUsed;
    }

    /**
     * Returns the isOfficial
     *
     * @return bool $isOfficial
     */
    public function getIsOfficial()
    {
        return $this->isOfficial;
    }

    /**
     * Sets the isOfficial
     *
     * @param bool $isOfficial
     * @return void
     */
    public function setIsOfficial($isOfficial)
    {
        $this->isOfficial = $isOfficial;
    }

    /**
     * Returns the boolean state of isOfficial
     *
     * @return bool
     */
    public function isIsOfficial()
    {
        return $this->isOfficial;
    }

    /**
     * Returns the isModified
     *
     * @return bool $isModified
     */
    public function getIsModified()
    {
        return $this->isModified;
    }

    /**
     * Sets the isModified
     *
     * @param bool $isModified
     * @return void
     */
    public function setIsModified($isModified)
    {
        $this->isModified = $isModified;
    }

    /**
     * Returns the boolean state of isModified
     *
     * @return bool
     */
    public function isIsModified()
    {
        return $this->isModified;
    }

    /**
     * Returns the isLatest
     *
     * @return bool $isLatest
     */
    public function getIsLatest()
    {
        return $this->isLatest;
    }

    /**
     * Sets the isLatest
     *
     * @param bool $isLatest
     * @return void
     */
    public function setIsLatest($isLatest)
    {
        $this->isLatest = $isLatest;
    }

    /**
     * Returns the boolean state of isLatest
     *
     * @return bool
     */
    public function isIsLatest()
    {
        return $this->isLatest;
    }

    /**
     * Returns the lastBugfixRelease
     *
     * @return string $lastBugfixRelease
     */
    public function getLastBugfixRelease()
    {
        return $this->lastBugfixRelease;
    }

    /**
     * Sets the lastBugfixRelease
     *
     * @param string $lastBugfixRelease
     * @return void
     */
    public function setLastBugfixRelease($lastBugfixRelease)
    {
        $this->lastBugfixRelease = $lastBugfixRelease;
    }

    /**
     * Returns the lastMinorRelease
     *
     * @return string $lastMinorRelease
     */
    public function getLastMinorRelease()
    {
        return $this->lastMinorRelease;
    }

    /**
     * Sets the lastMinorRelease
     *
     * @param string $lastMinorRelease
     * @return void
     */
    public function setLastMinorRelease($lastMinorRelease)
    {
        $this->lastMinorRelease = $lastMinorRelease;
    }

    /**
     * Returns the lastMajorRelease
     *
     * @return string $lastMajorRelease
     */
    public function getLastMajorRelease()
    {
        return $this->lastMajorRelease;
    }

    /**
     * Sets the lastMajorRelease
     *
     * @param string $lastMajorRelease
     * @return void
     */
    public function setLastMajorRelease($lastMajorRelease)
    {
        $this->lastMajorRelease = $lastMajorRelease;
    }

        /**
     * Get Category String
     *
     * @return string
     */
    public function getCategoryString()
    {
        $categoryString = '';
        if (isset(self::$defaultCategories[$this->getCategory()])) {
            $categoryString = self::$defaultCategories[$this->getCategory()];
        }
        return $categoryString;
    }

    /**
     * Get State string
     *
     * @return string
     */
    public function getStateString()
    {
        $stateString = '';
        if (isset(self::$defaultStates[$this->getState()])) {
            $stateString = self::$defaultStates[$this->getState()];
        }
        return $stateString;
    }

    /**
     * Contains default categories.
     *
     * @var array
     */
    protected static $defaultCategories = array(
        0 => 'be',
        1 => 'module',
        2 => 'fe',
        3 => 'plugin',
        4 => 'misc',
        5 => 'services',
        6 => 'templates',
        8 => 'doc',
        9 => 'example',
        10 => 'distribution'
    );

    /**
     * Contains default states.
     *
     * @var array
     */
    protected static $defaultStates = array(
        0 => 'alpha',
        1 => 'beta',
        2 => 'stable',
        3 => 'experimental',
        4 => 'test',
        5 => 'obsolete',
        6 => 'excludeFromUpdates',
        999 => 'n/a'
    );

}