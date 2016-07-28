<?php
namespace container;

class Container{
    protected $binds;
    protected $instances;
   /**
    *判断是否绑定实类
    */ 
    public function bind($abstract,$concrete){
        if($concrete instanceof Closure){
            $this->binds[$abstract]=$concrete;
        }else{
            $this->instances[$abstract]=$concrete;
        }
    }

   /**
    *创建名称叫$this->binds[$abstract]的函数
    */ 
    public function make($abstract,$parameters){
        if (isset($this->instances[$abstract])){
            return $this->instances[$abstract];
        }

        array_unshift($parameters,$this);

        return call_user_func_array($this->binds[$abstract],$parameters);
    }

}
