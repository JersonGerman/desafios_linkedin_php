<?php

class Nodo{
    public int $data;
    public $next;
    public function __construct(int $data) {
        $this->data = $data;
        $this->next = null;
    }
}
class LinkedList{
    private $head;
    public function __construct(){
        $this->head = null;
    }
    public function push($data){
        $newNodo = new Nodo($data);
        $newNodo->next = $this->head;
        $this->head = $newNodo;
    }

    public function append($data){
        $newNodo = new Nodo($data);
        if($this->head == null){
            $this->head = $newNodo;
            return;
        }
        $last = $this->head;
        while($last->next != null){
            $last = $last->next;
        }
        $last->next = $newNodo;


    }

    public function print(){
        $current = $this->head;
        while( $current != null){
            echo $current->data ." ";
            $current = $current->next; 
        }
    }

}

// $nodo1 = new Nodo(1);
// $nodo2 = new Nodo(2);
// $nodo3 = new Nodo(3);

/*$nodo1->next = $nodo2;
$nodo2->next = $nodo3;

echo $nodo3->next;*/

$lista = new LinkedList();
$lista->append(1);
$lista->append(2);
$lista->append(3);
$lista->append(4);
$lista->append(5);
$lista->append(6);

$lista->print();