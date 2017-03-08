<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Option extends Model
{

    protected $fillable= [
        'padre','nombre','descripcion','ruta','icono_r','icono_l'
    ];

    public static function has_children($opciones,$id) {
        foreach ($opciones as $op) {
            if ($op->padre == $id)
                return true;
        }
        return false;
    }

    public static function build_menu($opciones,$parent=0){

        $result = $parent==0 ? "<ul class=\"sidebar-menu\"><li class=\"header\"></li>" : "<ul class=\"treeview-menu\">";
        foreach ($opciones as $op)
        {
            if ($op->padre == $parent){
                $ruta= $op->ruta."";
                $ruta = url($ruta);
                $has_children= (self::has_children($opciones,$op->id) || $op->padre=="") ? true : false;

                $result.= $has_children ? "<li class='treeview'>" : "<li>";
                $result.= "<a href=\"{$ruta}\">";
                $result.= "<i class=\"fa {$op->icono_l}\"></i>";
                $result.= $has_children ? "<span>{$op->nombre}</span>" : $op->nombre;
                $result.= "<i class=\"fa {$op->icono_r} pull-right\"></i>";
                $result.= "</a>";

                if (self::has_children($opciones,$op->id))
                    $result.= self::build_menu($opciones,$op->id);
                $result.= "</li>";
            }
        }
        $result.= "</ul>";

        return $result;
    }

    public static function build_menu_form($opciones,$parent=0){

        $result = "<ul>";

        foreach ($opciones as $op) {
            if ($op->padre == $parent){

                $actionEdit = action('OptionMenuController@edit',$op->id);
                $actionDelet = action('OptionMenuController@destroy',["id" => $op->id]);

                $result.= "<li>{$op->nombre}";
                $result.= " <a href=\"{$actionEdit}\" data-toggle=\"tooltip\" title=\"Editar\"><span class='glyphicon glyphicon-edit'></span></a>";
                $result.= " <a data-toggle='modal' href='#modal-delete' data-action=\"{$actionDelet}\" class='text-danger btn-delete' ><span class=\"glyphicon glyphicon-remove\"  data-toggle=\"tooltip\" title=\"Eliminar\"></span></a>";

                if (self::has_children($opciones,$op->id))
                    $result.= self::build_menu_form($opciones,$op->id);
                $result.= "</li>";
                $ruta= url("/admin/option/create/{$op->id}");
                $result.= "<ul><li><a href=\"{$ruta}\" class='text-green text-sm' data-toggle=\"tooltip\" title=\"Nueva opcion\"><span class=\"glyphicon glyphicon-plus\"></span></a></li></ul>";
            }
        }
        $result.= "</ul>";


        return $result;
    }

    public static function build_menu_usuario($opciones,$parent=0,$usuario){

        $opcionesUsuario =  array_pluck($usuario->opciones->toArray(),'id');

        $result = "<ul>";

        foreach ($opciones as $op) {
            if ($op->padre == $parent){

                $checked = in_array($op->id,$opcionesUsuario) ? 'checked' : '';

                $result.= "<li>";
                $result.= "<div class=\"checkbox\">
                                	<label>
                                		<input type=\"checkbox\" value=\"{$op->id}\" name=\"opciones[]\" { $checked }>
                                		{$op->nombre}
                                	</label>
                                </div>";

                if (self::has_children($opciones,$op->id))
                    $result.= self::build_menu_usuario($opciones,$op->id,$usuario);
                $result.= "</li>";
            }
        }
        $result.= "</ul>";


        return $result;
    }

    public function scopePadres($query){

        return $query->whereNull('padre');
    }

    public function scopeHijos($query,$padre){

        return $query->where('padre','=',$padre);
    }

    /**
     * Devuelve los usuarios que tengan asignada la opcion
     */
    public function usuarios(){
        return $this->belongsToMany('App\User');
    }
}