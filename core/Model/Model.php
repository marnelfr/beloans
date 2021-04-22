<?php
namespace Core\Model;


use Core\Database\DataBase;

class Model{

    protected $id;
    protected $table;
    protected $entity;
    
    protected $fields;
    protected $tag;

    protected $base;

    public function find($id){
        return $this->base->prepare(
            'select * from ' . $this->table . ' where ' . $this->id . '=?',
            $this->entity,
            true,
            [$id]
        );
    }

    public function all(){
        return $this->base->prepare(
            'SELECT * FROM ' . $this->table,
            $this->entity
        );
    }

    public function lastId(){
        return $this->base->lastId();
    }

    /**
     * @return mixed
     */
    public function Fields(){
        if(is_null($this->fields)) {
            $desc = $this->base->prepare('desc ' . $this->table);
            $this->fields = [];
            $this->tag = [];
            foreach ($desc as $item) {
                $this->fields[] = $item->Field;
                if($item != end($desc)){
                    $this->tag[] = '?';
                }
            }
        }
        return $this->fields;
    }
    
    public function firstOrCreate(){
        $variables = func_get_args();
        $fields = implode('=? and ', $this->Fields());
        $fields = str_replace($this->id . '=? and ', '', $fields);
        $fields .= '=?';
        $user = $this->base->prepare(
            'select * from ' . $this->table . ' where ' . $fields,
            $this->entity,
            true,
            $variables
        );
        if($user){
            return $user->idUser;
        }else{
            $fields = implode(', ', $this->Fields());
            $this->tag = implode(', ', $this->tag);
            $fields = str_replace($this->id . ', ', '', $fields);
            if($this->base->request(
                'insert into ' . $this->table . ' (' . $fields . ') values (' . $this->tag . ')',
                $variables
                )
            ){
                return $this->base->lastId();
            }
            return false;
        }
    }

    public function delete($id){
        return $this->base->request(
            'delete from ' . $this->table . ' where ' . $this->id . '=?',
            [$id]
        );
    }

    public function insert(){
        $variables = func_get_args();
        $fields = implode(', ', $this->Fields());
        $this->tag = implode(', ', $this->tag);
        $fields = str_replace($this->id . ', ', '', $fields);
        var_dump('insert into ' . $this->table . ' (' . $fields . ') values (' . $this->tag . ')', $variables);
        if($this->base->request('insert into ' . $this->table . ' (' . $fields . ') values (' . $this->tag . ')', $variables)){
            return $this->base->lastId();
        }
        return false;
    }

    public function __construct(DataBase $db){
        $this->base = $db;
        $class = get_class($this);
        $parts = explode('\\', $class);
        $table = end($parts);
        $table = str_replace('Model', '', $table);
        $this->entity = '\\App\\Entity\\' . $table . 'Entity';
        if($this->id === null){
            $this->id = 'id' . $table;
        }
        $table = strtolower($table);
        if($this->table === null){
            $this->table = 'ac_' . $table . 's';
        }
        //var_dump($this->table, $this->entity, $this->id);
    }

}