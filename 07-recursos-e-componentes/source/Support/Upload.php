<?php

namespace Source\Support;

use CoffeeCode\Uploader\File;
use CoffeeCode\Uploader\Image;
use CoffeeCode\Uploader\Media;
use Source\Core\Message;

class Upload 
{
    private $message;

    public function __construct()
    {
        $this->message = new Message();
    }

    public function image(array $image, string $name, int $width = CONF_UPLOAD_IMAGE_WIDTH): ?string
    {
        $upload = new Image(CONF_UPLOAD_DIR, CONF_UPLOAD_IMAGE_FOLDER);
        $alloweds = $upload::isAllowed();

        if(!in_array($image['type'], $alloweds)) {
            $this->message->warning(
                'O tipo de arquivo enviado não é valido para upload de imagem'
            );
            return null;
        }

        $path = $upload->upload($image, $name, $width);

        return $path;
    }

    public function file(array $file, string $name): ?string
    {
        $upload = new File(CONF_UPLOAD_DIR, CONF_UPLOAD_FILE_FOLDER);
        $alloweds = $upload::isAllowed();

        if(!in_array($file['type'], $alloweds)) {
            $this->message->warning(
                'O tipo de arquivo enviado não é valido para upload de arquivo'
            );
            return null;
        }

        $path = $upload->upload($file, $name);

        return $path;
    }

    public function media(array $media, string $name): ?string
    {
        $upload = new Media(CONF_UPLOAD_DIR, CONF_UPLOAD_MEDIA_FOLDER);
        $alloweds = $upload::isAllowed();

        if(!in_array($media['type'], $alloweds)) {
            $this->message->warning('Este arquivo não é aceito como média');
            return null;
        }

        $path = $upload->upload($media, $name);
        return $path;
    }

    public function destroy(string $path): void
    {
        if(file_exists($path) && is_file($path)) {
            unlink($path);
        }
    }

    public function message(): Message
    {
        return $this->message;
    }
}