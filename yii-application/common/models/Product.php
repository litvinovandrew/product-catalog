<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $status
 * @property string|null $slug
 * @property int $template_id
 * @property int $user_id
 * @property int $category_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property ProductAttribute[] $productAttributes
 * @property ProductImage[] $productImages
 * @property User $user
 * @property ProductTemplate $template
 * @property Category $category
 * @property Rating[] $ratings
 */
class Product extends \yii\db\ActiveRecord
{

    public $imageFiles = [];
    public $imagePaths = [];
    public $attribute = [];
    public $attributeValue;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'template_id', 'user_id', 'category_id','price','attribute','attributeValue'], 'required'],
            [['description'], 'string'],
            [['status', 'template_id', 'user_id', 'category_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['slug'], 'string', 'max' => 45],
            [['user_id'], 'default', 'value' => Yii::$app->user->id],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['template_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductTemplate::className(), 'targetAttribute' => ['template_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
            'slug' => 'Slug',
            'template_id' => 'Template ID',
            'user_id' => 'User ID',
            'category_id' => 'Category ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'imageFiles' => 'Files',
            'price' => 'Price',
            'attribute' => 'Attribute(s)',
            'attributeValue' => 'Attribute value',
        ];
    }

    /**
     * Gets query for [[ProductAttributes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductAttributes()
    {
        return $this->hasMany(ProductAttribute::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImage::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Template]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTemplate()
    {
        return $this->hasOne(ProductTemplate::className(), ['id' => 'template_id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Ratings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRatings()
    {
        return $this->hasMany(Rating::className(), ['product_id' => 'id']);
    }

    /**
     * @return bool
     */
    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                if ($file->saveAs(Yii::getAlias('@common') . '/uploads/' . $file->baseName . '.' . $file->extension)) {
                    $this->imagePaths[] =  $file->baseName . '.' . $file->extension;
                }
            }
            return true;
        } else {
            return false;
        }
    }
}
