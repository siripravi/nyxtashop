<?php
/**
 * Created by PhpStorm.
 * User: Dench
 * Date: 28.01.2017
 * Time: 22:40
 */

namespace common\modules\image\models;

use DateTime;
use Yii;
use yii\base\Model;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
use common\modules\image\models\File;
use common\modules\image\models\Image;

class UploadFiles extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $files;

    public $upload;

    public $extensions;

    public $group;

    private $maxSize;
    private $maxFiles;
    private $path;

    public function init()
    {
        parent::init();

        $param = Yii::$app->params['file'];

        $this->extensions = $this->extensions ?? $param['extensions'];

        $this->maxSize = $param['maxSize'];
        $this->maxFiles = $param['maxFiles'];
        $this->path = Yii::getAlias($param['path']);
    }

    public function rules()
    {
        return [
            [['files'], 'file', 'skipOnEmpty' => true, 'extensions' => $this->extensions, 'maxSize' => $this->maxSize, 'maxFiles' => $this->maxFiles],
        ];
    }

    public function attributeLabels()
    {
        return [
            'files' => Yii::t('app', 'Загрузка файлов'),
        ];
    }

    public function attributeHints()
    {
        return [
            'files' => implode(', ', $this->extensions),
        ];
    }

    public function upload()
    {
        $this->upload = [];

        if ($this->validate()) {

            $date = new DateTime();
            $path = $date->format('Y/m/d');

            FileHelper::createDirectory($this->path . '/' .$path);

            foreach ($this->files as $key => $file) {

                $type = $file->type;
                $size = $file->size;
                $extension = $file->extension;
                $hash = md5_file($file->tempName);

                $dub = File::findDuplicate($hash, $size);

                $f = new File();
                $f->hash = $hash;
                $f->type = $type;
                $f->size = $size;
                $f->extension = $dub ? $dub->extension : $extension;
                $f->path = $dub ? $dub->path : $path;
                $f->name = $file->baseName;
                $f->user_id = Yii::$app->user->getId();
                $f->group = $this->group;
                if ($f->save() && $dub === null) {
                    $file->saveAs($this->path . '/' .$path . '/' . $f->hash . '.' . $f->extension);
                }

                $this->upload[$key]['file'] = $f;

                if (preg_match('#^image/#', $f->type)) {
                    $image = new Image();
                    $image->file_id = $f->id;
                    $image->name = $f->name; //null;
                    $img = \yii\imagine\Image::getImagine()->open($this->path . '/' . $f->path . '/' . $f->hash . '.' . $f->extension);
                    $image->width = $img->getSize()->getWidth();
                    $image->height = $img->getSize()->getHeight();
                    $image->save();

                    $this->upload[$key]['image'] = $image;
                }
            }
           
            return $this->upload;
        }

        return false;
    }
}