<?php
namespace components;

/**
 * Class FileUpload
 * @package components
 * =================================================================================
 * Компонент для загрузки файла на сервер
 * =================================================================================
 */

class FileUpload
{
    public function uploadFile(array $file ,array $type)
    {

        //1 часть закачиваем файл на сервер
        if(isset($file) && in_array($file['file']['type'],$type['fileMimes']) && is_uploaded_file($file['file']['tmp_name']))
        {
            $filePath1='../web/img/';
            $fileName=md5(time($file['file']['name'])).'.'.pathinfo($file['file']['name'],PATHINFO_EXTENSION);
            $filePath=$filePath1.$fileName;

            move_uploaded_file($file['file']['tmp_name'],$filePath);
            //2 уменьшение файла в размерах
            $this->load($filePath1.$fileName);
            $this->resize('400','300');
            $this->save($filePath1.$fileName);
            return $fileName;
        }



        else return $fileName='';
        
    }
/*
//======================================================================================================================
//======================================================================================================================
//                                                Блок для редактирования размера изорбражения
// Наглядный вариант применения
<?php
        include('classSimpleImage.php');
        $image = new SimpleImage();
        $image->load('image.jpg');
        $image->resize(400, 200);
        $image->save('image1.jpg');
?>
//======================================================================================================================
//======================================================================================================================
*/
    var $image;
    var $image_type;

    /**
     * @param $filename
     * ==============================================================================================================
     * //1 достать само изображение из файла
     *
     * ==============================================================================================================
     */

    public function load($filename) {
        $image_info = getimagesize($filename);

        $this->image_type = $image_info[2];
        if( $this->image_type == IMAGETYPE_JPEG ) {
            $this->image = imagecreatefromjpeg($filename);
        } elseif( $this->image_type == IMAGETYPE_GIF ) {
            $this->image = imagecreatefromgif($filename);
        } elseif( $this->image_type == IMAGETYPE_PNG ) {
            $this->image = imagecreatefrompng($filename);
        }
    }

    // 2 узнать значения высоты/ширины
   public function getWidth() {
        return imagesx($this->image);
    }
   public function getHeight() {
        return imagesy($this->image);
    }

//=====================================================================================================================
//                      Само изменение размера картинки
//=====================================================================================================================

//3.1  ИЗМЕНЕНИЕ  картинки, относительно одной из сторон
   public function resizeToHeight($height) {
        $ratio = $height / $this->getHeight();
        $width = $this->getWidth() * $ratio;
        $this->resize($width,$height);
    }
   public function resizeToWidth($width) {
        $ratio = $width / $this->getWidth();
        $height = $this->getheight() * $ratio;
        $this->resize($width,$height);
    }


//3.2 изменение размера изображения в процентном отношении
   public function scale($scale) {
        $width = $this->getWidth() * $scale/100;
        $height = $this->getheight() * $scale/100;
        $this->resize($width,$height);
    }

//3.3 ИЗМЕНЕНИЕ  картинки, с указанием ширины и высоты
   public function resize($width,$height) {
        $new_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        $this->image = $new_image;
    }


//4 вывести изображение в браузер без его сохранения
   public function output($image_type=IMAGETYPE_JPEG) {
        if( $image_type == IMAGETYPE_JPEG ) {
            imagejpeg($this->image);
        } elseif( $image_type == IMAGETYPE_GIF ) {
            imagegif($this->image);
        } elseif( $image_type == IMAGETYPE_PNG ) {
            imagepng($this->image);
        }
    }


//5 финальный метод ,который собственно и загружает картинку в рабочую директорию
   public function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
        if( $image_type == IMAGETYPE_JPEG ) {
            imagejpeg($this->image,$filename,$compression);
        } elseif( $image_type == IMAGETYPE_GIF ) {
            imagegif($this->image,$filename);
        } elseif( $image_type == IMAGETYPE_PNG ) {
            imagepng($this->image,$filename);
        }
        if( $permissions != null) {
            chmod($filename,$permissions);
        }
    }












































}