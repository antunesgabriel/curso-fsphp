<?php

namespace Source\Support;

use CoffeeCode\Cropper\Cropper;

class Cache {

    /**
     * @var Cropper $cropper
     */
    private $cropper;
    

    /**
     * @var string $uploadDir 
     */
    private $uploadDir;


    public function __construct()
    {
        $this->uploadDir = CONF_UPLOAD_DIR;
        $this->cropper = new Cropper(
            CONF_UPLOAD_CACHE_DIR, CONF_UPLOAD_IMAGE_QUALY['jpg'],
            CONF_UPLOAD_IMAGE_QUALY['png']
        );
    }


    /**
     * Faz cache de uma imagem, se ja existir retorna a url dela
     * @param string $imgPath Path de origin da imagem a ser cacheada
     * @param int $width Largura que a imagem deve ser cacheada
     * @param int|null
     */
    public function make(string $imgPath, int $width, int $heigth = null):string
    {
        $path = "{$this->uploadDir}/{$imgPath}"; 
        $imgUrl = $this->cropper->make($path, $width, $heigth);
        return $imgUrl;
    }

    /**
     * Limpa todo o cache ou somente uma imagem especifica
     * @param string|null $imgPath Path de origem da imagem em cache a ser excluida
     */
    public function flush(string $imgPath = null): ?Cache
    {
        if ($imgPath) {
            $path = "{$this->uploadDir}/{$imgPath}";
            $this->cropper->flush($path);
            return null;
        }

        $this->cropper->flush();

        return $this;
    }

    public function getCropper(): Cropper
    {
        return $this->cropper;
    }
}