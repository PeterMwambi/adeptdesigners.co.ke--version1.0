<?php

/**
 * @author Peter Mwambi
 * @content File Upload class
 * @date Mon May 24 2021 01:10:58 GMT+0300 (East Africa Time)
 * 
 * Validate and upload files 
 */

class File
{
    /**
     * @var string $targetDirectory
     * The target directory
     */
    public $targetDirectory = null;

    /**
     * @var string $targetFile
     * The target file
     */
    public $targetFile = null;

    /**
     * @param string $fileTmpName
     * Temporary filename
     */
    public $fileTmpName = null;

    /**
     * @param string $fileExtension
     * The file extension
     */
    public $fileExtension = null;
    /**
     * @param string $file_id
     * The file id
     */
    public $file_id = null;
    /**
     * @param array
     * The file upload data array
     */
    public $uploadData = array();
    /**
     * @param string $fileSize
     * The file size
     */
    public $fileSize = null;
    /**
     * @param string $validImageIdentifier
     * Image validator
     */
    public $validImageIdentifier;

    public $passed = false;

    public $uploadName = null;

    public $errors = array();


    public function setFileRequirements(string $fileName, string $targetDirectory)
    {
        if (!empty($fileName) && is_string($fileName)) {
            $this->targetDirectory = $targetDirectory;
            $this->targetFile = $this->targetDirectory . basename($_FILES[$fileName]["name"]);
            $this->uploadName = Sanitize::__string($_FILES[$fileName]["name"]);
            $this->fileExtension = strtolower(pathinfo($this->targetFile, PATHINFO_EXTENSION));
            $this->fileSize = $_FILES[$fileName]["size"];
            $this->fileTmpName = $_FILES[$fileName]["tmp_name"];
            $this->file_id = rand(100000, 1000000);
            if (!empty($this->fileTmpName)) {
                $this->validImageIdentifier = getimagesize($this->fileTmpName);
            }
            return $this;
        }
        return false;
    }

    public function validateTrueImageFile()
    {
        if (isset($this->validImageIdentifier)) {
            if ($this->validImageIdentifier !== false) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }
    public function checkExists()
    {
        if (isset($this->targetFile)) {
            if (file_exists($this->targetFile)) {
                return true;
            }
            return false;
        }
        return false;
    }
    public function checkSize(int $fileSize)
    {
        if (isset($this->fileSize) && is_int($fileSize)) {
            if ($this->fileSize > $fileSize) {
                return false;
            }
            return true;
        }
        return false;
    }
    public function checkExtension($allowedFileExtensions = array())
    {
        if (count($allowedFileExtensions) && isset($this->fileExtension)) {
            if (!in_array($this->fileExtension, $allowedFileExtensions)) {
                return false;
            }
            return true;
        }
        return false;
    }
    public function upload()
    {

        if (isset($this->fileTmpName)) {
            if (move_uploaded_file($this->fileTmpName, $this->targetFile)) {
                return true;
            }
            return false;
        }
        return false;
    }

    public function getUploadRequest(string $file_name, string $target_dir)
    {
        $this->verifyUploadRequest($file_name, $target_dir);
        if ($this->assertUploadStatus()) {
            return true;
        }
        return false;
    }

    public function verifyUploadRequest($fileName, $directory)
    {
        if (!$this->setFileRequirements($fileName, $directory)) {
            return false;
        }
        if (!$this->validateTrueImageFile()) {
            $this->generateErrorMsg("File uploaded is not a valid image");
        }
        if ($this->checkExists()) {
            $this->generateErrorMsg("Image file already exists");
        }
        if (!$this->checkSize(500000)) {
            $this->generateErrorMsg("File uploaded exeeds maximum image size upload");
        }
        if (!$this->checkExtension(array("jpg", "jpeg", "gif", "png"))) {
            $this->generateErrorMsg("Invalid file type");
        }
        return $this;
    }

    public function processUploadRequest()
    {
        if ($this->assertUploadStatus()) {
            if ($this->upload()) {
                return true;
            }
            return false;
        }
        return false;
    }
    public function assertUploadStatus()
    {
        if (empty($this->errors)) {
            $this->passed = true;
        }
        return $this->passed;
    }

    public function generateErrorMsg($error)
    {
        $this->errors[] = $error;
    }
    public function outputToGUI()
    {
        foreach ($this->errors as $error) {
            return $error;
        }
    }

    public function getFileId()
    {
        if (isset($this->file_id)) {
            return $this->file_id;
        }
        return false;
    }


    public function processDbUpload($table, string $field)
    {
        if (isset($this->conn) && $this->assertUploadStatus() === true) {
            $this->conn->generateSelectQuery(array($field), $table, 1, array($field => $this->uploadName));
            $result = $this->conn->getOutput();
            if ($result !== null) {
                $this->uploadData = array($field => $this->uploadName, "product_id" => $this->file_id);
                $this->conn->generateInsertQuery($table, $this->uploadData);
                return true;
            } else
                return false;
        }
        return false;
    }
}
