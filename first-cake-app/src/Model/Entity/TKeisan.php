<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TKeisan Entity
 *
 * @property int $id
 * @property int|null $userId
 * @property \Cake\I18n\FrozenTime|null $targetDate
 * @property string|null $category
 * @property string|null $sum
 * @property string|null $koumoku
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class TKeisan extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'userId' => true,
        'targetDate' => true,
        'category' => true,
        'sum' => true,
        'koumoku' => true,
        'created' => true,
        'modified' => true,
    ];
}
