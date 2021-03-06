<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace TYPO3\CMS\Core\Resource\Event;

use TYPO3\CMS\Core\Resource\Driver\DriverInterface;
use TYPO3\CMS\Core\Resource\Folder;
use TYPO3\CMS\Core\Resource\ResourceStorage;

/**
 * This event is fired before a file is about to be added to the Resource Storage / Driver.
 *
 * This allows to do custom checks to a file or restrict access to a file before the file is added.
 */
final class BeforeFileAddedEvent
{
    /**
     * @var string
     */
    private $fileName;

    /**
     * @var string
     */
    private $sourceFilePath;

    /**
     * @var Folder
     */
    private $targetFolder;

    /**
     * @var ResourceStorage
     */
    private $storage;

    /**
     * @var DriverInterface
     */
    private $driver;

    public function __construct(string $fileName, string $sourceFilePath, Folder $targetFolder, ResourceStorage $storage, DriverInterface $driver)
    {
        $this->fileName = $fileName;
        $this->sourceFilePath = $sourceFilePath;
        $this->targetFolder = $targetFolder;
        $this->storage = $storage;
        $this->driver = $driver;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function setFileName(string $fileName): void
    {
        $this->fileName = $fileName;
    }

    public function getSourceFilePath(): string
    {
        return $this->sourceFilePath;
    }

    public function getTargetFolder(): Folder
    {
        return $this->targetFolder;
    }

    public function getStorage(): ResourceStorage
    {
        return $this->storage;
    }

    public function getDriver(): DriverInterface
    {
        return $this->driver;
    }
}
