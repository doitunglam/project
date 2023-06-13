<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Chidoan
 *
 * @property string $MaCD
 * @property string $TenCD
 * @property string $DiaChi
 * @property string $SDT
 * @property string $MaKhoa
 *
 * @package App\Models
 */
class Chidoan extends Model
{
	protected $table = 'chidoan';
	public $incrementing = false;
	public $timestamps = false;

    protected $primaryKey = 'MaCD';


	protected $fillable = [
		'MaCD',
		'TenCD',
		'DiaChi',
		'SDT',
		'MaKhoa'
	];
}
