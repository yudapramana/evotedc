<?php

namespace App\Model;

use App\Casts\JsonLang;
use App\Traits\JsonAttribute;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class Menu extends Model
{
    use JsonAttribute;
    protected $table = 'menus';
    protected $fillable = [
        'parent_id',
        'name',
        'menu_type',
        'slug',
        'route_name',
        'prefix_permission',
        'icon_type',
        'icon',
        'status',
    ];

    protected $casts = [
        'name' => JsonLang::class
    ];

    public function children()
    {
        return $this->hasMany(Menu::class,'parent_id');
    }

    public function parent()
    {
        return $this->hasOne(Menu::class,'id', 'parent_id');
    }

    public function allParent()
    {
        return $this->parent()->with('allParent');
    }

    public function allChildren()
    {
        return $this->children()->where('status', true)->with('allChildren');
    }

    public function permissions() {
        return $this->hasMany(Permission::class, 'menu_id', 'id');
    }
}
